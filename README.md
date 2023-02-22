# Sistema de assinatura
O sistema foi construído utilizando o framework Laravel e a biblioteca Stripe para processar os pagamentos das assinaturas.

Algumas das principais funcionalidades do sistema de assinaturas incluem:
* [x] Registro e autenticação de usuários
* [x] Planos de assinatura mensal
* [x] Processamento de pagamentos com cartão de crédito ou débito
* [x] Página de perfil do usuário para gerenciar informações da conta e cancelar a assinatura
* [ ] Controle de acesso aos cursos com base no plano de assinatura


## Ferramentas utilizadas
<table style="width:100%">
    <thead>
      <tr>
        <th></th>
        <th>Ambiente de trabalho</th>
        <th>Documentação</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="https://www.docker.com/wp-content/uploads/2022/03/Moby-logo.png" width="50" alt="docker"></td>
        <td>Docker</td>
        <td><a target="_blank" href="https://www.docker.com/">https://www.docker.com/</a></td>
      </tr>   
      <tr>
        <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" width="50" alt="laravel"></td>
        <td>Laravel 8</td>
        <td><a target="_blank" href="https://laravel.com/">https://laravel.com/</a></td>
      </tr> 
      <tr>
        <td><img src="https://seeklogo.com/images/I/insomnia-logo-A35E09EB19-seeklogo.com.png" width="50" alt="insomnia"></td>
        <td>Insomnia</td>
        <td><a target="_blank" href="https://insomnia.rest/">https://insomnia.rest/</a></td>
      </tr>
      <tr>
        <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Stripe_Logo%2C_revised_2016.svg/1200px-Stripe_Logo%2C_revised_2016.svg.png" width="50" alt="Stripe Api"/></td>
        <td>Stripe</td>
        <td><a target="_blank" href="https://stripe.com/docs/">https://stripe.com/docs/</a></td>
      </tr>
    </tbody>
</table>

## Comandos de execução

### Execução do docker

- Para iniciar o projeto pela primeira vez, execute:
```
    docker-compose up -d --build
```
- Após o 1º build, poderá está executando sem a flag --build
```
    docker-compose up -d
```
- Para acessar os container, execute:
```
    docker-compose exec app bash
```
- Para derrubar os container, execute:
```
    docker-compose down
```

### Instalação
1. Clone o repositório:
```
    git clone https://github.com/RayconBatista/laravel-subscrition.git
```

#### Siga essas instruções dentro do container App:
2. Após o 1º build ou a execução do docker, instale as dependências dentro do container App:
```
    composer install
```

3. Crie um arquivo .env com as informações do seu banco de dados:
```
    cp .env.example .env
```

4. Gere uma nova chave para a aplicação:
```
    php artisan key:generate
```

5. Execute as migrações do banco de dados:
```
    php artisan migrate
```

### Comandos Adicionais
6. Para facilitar no cadastro de planos e registrar diretamente no Stripe, execute:
```
    php artisan stripe:RegisterPlan
```


### Agradecimentos
Gostaría de agradecer ao [EspecializaTI](https://academy.especializati.com.br)  por ter proposto este projeto educacional onde seu intuito é demonstrar como desenvolver 
uma plataforma de assinatura que possa servir como um microsserviço no futuro foi muito valioso para nós e para toda a comunidade 
que utiliza a linguagem de programação Laravel.

Agradeço também pela oportunidade de trabalhar em um projeto real e prático, 
que proporcionou uma experiência valiosa de aprendizado e aprimoramento das nossas habilidades de desenvolvimento de software.
