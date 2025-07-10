<?php
    $this->layout("_theme", ["title" => "Perguntas Frequentes | RoomManager"]);
?>
<section class="faq-container">
    <h1>Perguntas Frequentes</h1>
    <section class="faq-list">
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">O que é o RoomManager?</button>
            <div class="faq-answer">
                <p>O RoomManager é um sistema online para gerenciamento e agendamento de salas de reunião, ideal para pequenas e médias empresas que buscam otimizar o uso de seus espaços.</p>
            </div>
        </article>
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">Como faço para agendar uma sala de reunião?</button>
            <div class="faq-answer">
                <p>Basta acessar sua conta, escolher a sala desejada, selecionar a data e o horário disponíveis e confirmar a reserva pelo painel do sistema.</p>
            </div>
        </article>
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">Posso cancelar ou alterar uma reserva?</button>
            <div class="faq-answer">
                <p>Sim, você pode cancelar ou alterar reservas diretamente pelo painel, desde que respeite as regras de antecedência definidas pela empresa.</p>
            </div>
        </article>
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">O RoomManager possui integração com calendário externo?</button>
            <div class="faq-answer">
                <p>Sim, é possível integrar o RoomManager com Google Agenda e Outlook para facilitar o gerenciamento dos seus compromissos.</p>
            </div>
        </article>
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">Como recupero minha senha?</button>
            <div class="faq-answer">
                <p>Na tela de login, clique em "Esqueci minha senha" e siga as instruções para redefinir seu acesso.</p>
            </div>
        </article>
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">O sistema é seguro?</button>
            <div class="faq-answer">
                <p>Sim, utilizamos criptografia e boas práticas de segurança para proteger seus dados e informações de reservas.</p>
            </div>
        </article>
        <article class="faq-item">
            <button class="faq-question" aria-expanded="false">Como entro em contato com o suporte?</button>
            <div class="faq-answer">
                <p>Você pode entrar em contato pelo formulário de contato no site ou pelo e-mail suporte@roommanager.com.br.</p>
            </div>
        </article>
    </section>
</section>
<link rel="stylesheet" href="<?= url('assets/web/styles/faq.css') ?>">
<script src="<?= url('assets/web/js/faq.js') ?>"></script>
