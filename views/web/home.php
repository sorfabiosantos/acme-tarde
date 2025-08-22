<?php
$this->layout("_theme", [
    "title" => "RoomManager - Gestão Inteligente de Salas de Reunião",
    "description" => "Transforme a gestão das suas salas de reunião com nossa plataforma completa. Agendamento inteligente, controle de disponibilidade e relatórios detalhados para pequenas e médias empresas."
]);
?>

<?php
$this->start("specific-styles");
?>
<link rel="stylesheet" href="<?= url("assets/web/styles/home.css"); ?>">
<?php
$this->end();
?>

<!-- Hero Section -->
<section class="hero">
    <article class="hero-container">
        <h1>Gerencie suas salas de reunião com eficiência</h1>
        <p>Simplifique o agendamento e controle de salas de reunião na sua empresa com nossa plataforma intuitiva e completa.</p>
        <nav class="hero-cta">
            <a href="/cadastro" class="btn btn-white btn-large">
                <i class="fas fa-rocket"></i>
                Começar Gratuitamente
            </a>
            <a href="#funcionalidades" class="btn btn-outline btn-large" style="color: white; border-color: white;">
                <i class="fas fa-play"></i>
                Ver Demonstração
            </a>
        </nav>
    </article>
</section>

<!-- Features Section -->
<section class="features" id="funcionalidades">
    <article class="section-container">
        <header class="section-header">
            <h2>Funcionalidades Poderosas</h2>
            <p>Tudo que você precisa para gerenciar suas salas de reunião de forma eficiente e profissional.</p>
        </header>
        
        <main class="features-grid">
            <article class="feature-card">
                <figure class="feature-icon">
                    <i class="fas fa-calendar-alt"></i>
                </figure>
                <h3>Agendamento Inteligente</h3>
                <p>Sistema de reservas avançado com verificação automática de disponibilidade e prevenção de conflitos.</p>
            </article>
            
            <article class="feature-card">
                <figure class="feature-icon">
                    <i class="fas fa-users"></i>
                </figure>
                <h3>Gestão de Usuários</h3>
                <p>Controle completo de permissões, departamentos e hierarquias para diferentes níveis de acesso.</p>
            </article>
            
            <article class="feature-card">
                <figure class="feature-icon">
                    <i class="fas fa-chart-bar"></i>
                </figure>
                <h3>Relatórios Detalhados</h3>
                <p>Análises completas de uso, ocupação e estatísticas para otimizar o aproveitamento dos espaços.</p>
            </article>
            
            <article class="feature-card">
                <figure class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </figure>
                <h3>Acesso Mobile</h3>
                <p>Interface responsiva e aplicativo mobile para gerenciar reservas em qualquer lugar e momento.</p>
            </article>
            
            <article class="feature-card">
                <figure class="feature-icon">
                    <i class="fas fa-bell"></i>
                </figure>
                <h3>Notificações</h3>
                <p>Alertas automáticos por email e SMS para confirmações, lembretes e mudanças de agendamento.</p>
            </article>
            
            <article class="feature-card">
                <figure class="feature-icon">
                    <i class="fas fa-cog"></i>
                </figure>
                <h3>Integrações</h3>
                <p>Conecte com Google Calendar, Outlook, Slack e outras ferramentas que sua empresa já utiliza.</p>
            </article>
        </main>
    </article>
</section>

<!-- Pricing Section -->
<section class="pricing" id="planos">
    <article class="section-container">
        <header class="section-header">
            <h2>Planos para Todo Tamanho de Empresa</h2>
            <p>Escolha o plano ideal para suas necessidades e comece a transformar a gestão das suas salas hoje mesmo.</p>
        </header>
        
        <main class="pricing-grid">
            <article class="pricing-card">
                <h3>Free</h3>
                <span class="price">Grátis</span>
                <small class="period">Para sempre</small>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Até 2 salas</li>
                    <li><i class="fas fa-check"></i> 5 usuários</li>
                    <li><i class="fas fa-check"></i> Agendamento básico</li>
                    <li><i class="fas fa-check"></i> Suporte por email</li>
                    <li><i class="fas fa-check"></i> Relatórios básicos</li>
                </ul>
                <a href="/cadastro?plano=free" class="btn btn-outline" style="width: 100%;">Começar Grátis</a>
            </article>
            
            <article class="pricing-card featured">
                <span class="pricing-badge">Mais Popular</span>
                <h3>Plus</h3>
                <span class="price">R$ 29</span>
                <small class="period">por mês</small>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Até 10 salas</li>
                    <li><i class="fas fa-check"></i> 25 usuários</li>
                    <li><i class="fas fa-check"></i> Agendamento avançado</li>
                    <li><i class="fas fa-check"></i> Notificações SMS/Email</li>
                    <li><i class="fas fa-check"></i> Relatórios detalhados</li>
                    <li><i class="fas fa-check"></i> Integrações básicas</li>
                    <li><i class="fas fa-check"></i> Suporte prioritário</li>
                </ul>
                <a href="/cadastro?plano=plus" class="btn btn-primary" style="width: 100%;">Escolher Plus</a>
            </article>
            
            <article class="pricing-card">
                <h3>Premium</h3>
                <span class="price">R$ 79</span>
                <small class="period">por mês</small>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Salas ilimitadas</li>
                    <li><i class="fas fa-check"></i> Usuários ilimitados</li>
                    <li><i class="fas fa-check"></i> Recursos avançados</li>
                    <li><i class="fas fa-check"></i> API completa</li>
                    <li><i class="fas fa-check"></i> Todas as integrações</li>
                    <li><i class="fas fa-check"></i> Suporte 24/7</li>
                    <li><i class="fas fa-check"></i> Consultoria personalizada</li>
                </ul>
                <a href="/cadastro?plano=premium" class="btn btn-outline" style="width: 100%;">Escolher Premium</a>
            </article>
        </main>
    </article>
</section>

<!-- CTA Section -->
<section class="cta">
    <article class="section-container">
        <h2>Pronto para transformar sua gestão de salas?</h2>
        <p>Junte-se a centenas de empresas que já otimizaram seus espaços de reunião com o RoomManager.</p>
        <a href="/cadastro" class="btn btn-white btn-large">
            <i class="fas fa-rocket"></i>
            Começar Agora - É Grátis
        </a>
    </article>
</section>