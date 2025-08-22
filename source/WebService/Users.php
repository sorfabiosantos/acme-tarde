<?php

namespace Source\WebService;

use Source\Models\Store\Product;
use Source\Models\User;
use Source\Core\JWTToken;
use SorFabioSantos\Uploader\Uploader;

class Users extends Api
{
    public function testModel (array $data): void
    {
        echo "Testando o model";
        $product = new Product(
            NULL,
            1,
            "Teste",
            4
        );

        if(!$product->insert()) {
            echo $product->getErrorMessage();
        }
    }

    public function listUsers (): void
    {
        $users = new User();
        //var_dump($users->findAll());
        $this->call(200, "success", "Lista de usuários", "success")
            ->back($users->findAll());
    }

    public function createUser(array $data)
    {

        // verifica se os dados estão preenchidos
        if(in_array("", $data)){
            $this->call(400, "bad_request", "Dados inválidos", "error")->back();
            return;
        }

        $user = new User(
            null,
            $data["idType"] ?? null,
            $data["name"] ?? null,
            $data["email"] ?? null,
            $data["password"] ?? null
        );

        if(!$user->insert()){
            $this->call(400, "internal_server_error", $user->getErrorMessage(), "error")->back();
            return;
        }
        // montar $response com as informações necessárias para mostrar no front
        $response = [
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "photo" => $user->getPhoto()
        ];

        $this->call(201, "created", "Usuário criado com sucesso", "success")
            ->back($response);

    }

    public function updatePhoto (): void
    {
        $this->auth();

        $photo = (!empty($_FILES["photo"]["name"]) ? $_FILES["photo"] : null);

        $upload = new Uploader();
        $path = $upload->Image($photo);
        if(!$path) {
            $this->call(400, "bad_request", $upload->getMessage(), "error")->back();
            return;
        }

        $user = new User();
        $user->findByEmail($this->userAuth->email);
        if(file_exists(__DIR__ . "/../..". IMAGE_DIR . "/" . "{$user->getPhoto()}")){
            unlink(__DIR__ . "/../.." . IMAGE_DIR . "/" . "{$user->getPhoto()}");
        }

        $user->setPhoto($path);
        if(!$user->updateById()){
            $this->call(500, "internal_server_error", $user->getErrorMessage(), "error")->back();
            return;
        }

        $this->call(200, "success", "Foto atualizada com sucesso", "success")->back();

    }

    public function updateFile():void
    {
        $this->auth();

        $file = (!empty($_FILES["file"]["name"]) ? $_FILES["file"] : null);

        $upload = new Uploader();
        $path = $upload->File($file);
        if(!$path) {
            $this->call(400, "bad_request", $upload->getMessage(), "error")->back();
            return;
        }

        $user = new User();
        $user->findByEmail($this->userAuth->email);
        $user->setPhoto($path);
        if(!$user->updateById()){
            $this->call(500, "internal_server_error", $user->getErrorMessage(), "error")->back();
            return;
        }

        $this->call(200, "success", "Arquivo atualizada com sucesso", "success")->back();

    }

    public function listUserById (array $data): void
    {

        if(!isset($data["id"])) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        if(!filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $user = new User();
        if(!$user->findById($data["id"])){
            $this->call(200, "success", "Usuário não encontrado", "error")->back();
            return;
        }
        $response = [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ];
        $this->call(200, "success", "Encontrado com sucesso", "success")->back($response);
    }

    public function deleteUser (array $data): void
    {
        //$this->auth();
        var_dump($data);
        $this->call(200, "success", "Usuário excluído com sucesso", "success")
            ->back($data);
    }

    public function updateUser (array $data): void
    {
        $this->auth();
        var_dump($data, $this->userAuth);
        //var_dump( $this->userAuth);
        //var_dump($this->userAuth->name, $this->userAuth->email);
       /* $user = new User(
            $this->userAuth->id,
            $data["idType"],
            $data["name"],
            $data["email"]
        );
        var_dump($user);*/
    }

    public function login(): void
    {
        //var_dump($this->headers);
        // Verificar se os dados de login foram fornecidos
        if (empty($this->headers["email"]) || empty($this->headers["password"])) {
            $this->call(400, "bad_request", "Credenciais inválidas", "error")->back();
            return;
        }

        $user = new User();

        if(!$user->findByEmail($this->headers["email"])){
            $this->call(401, "unauthorized", "Usuário não encontrado", "error")->back();
            return;
        }

        if(!password_verify($this->headers["password"], $user->getPassword())){
            $this->call(401, "unauthorized", "Senha inválida", "error")->back();
            return;
        }

        // Gerar o token JWT
        $jwt = new JWTToken();
        $token = $jwt->create([
            "email" => $user->getEmail(),
            "name" => $user->getName(),
            "photo" => $user->getPhoto(),
            "rule" => $user->getIdType()
        ]);

        // Retornar o token JWT na resposta
        $this->call(200, "success", "Login realizado com sucesso", "success")
            ->back([
                "token" => $token,
                "user" => [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                    "photo" => $user->getPhoto()
                ]
            ]);

    }
}