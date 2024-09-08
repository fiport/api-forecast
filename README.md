
# 🚀 Laravel Project Setup

Bem-vindo ao seu projeto Laravel! Este guia irá orientá-lo na configuração e execução do ambiente de desenvolvimento usando o Docker com Laravel Sail. Siga os passos abaixo para começar rapidamente.

## 🛠 Pré-requisitos

- **Docker**: Certifique-se de que o Docker está instalado e funcionando no seu sistema.
- **Laravel Sail**: O Laravel Sail será usado para orquestrar o ambiente de desenvolvimento. Ele é uma camada mais simples sobre o Docker.

---

## ⚙️ Configurando o Projeto

### 1️⃣ Subindo o ambiente Docker

Antes de começar, você precisa subir o ambiente Docker que foi configurado pelo Laravel Sail.

```bash
./vendor/bin/sail up -d
```

> Esse comando iniciará o ambiente de containers no modo *detached*, rodando em segundo plano.

---

### 2️⃣ Configurando o arquivo `/etc/hosts`

Para garantir que o domínio local funcione corretamente, você precisará configurar o arquivo de *hosts* do sistema.

- Abra o arquivo `/etc/hosts` em seu editor de texto favorito.
- Adicione a seguinte linha ao arquivo:

```bash
127.0.0.1 local.api.forecast.com.br
```

Essa configuração permitirá que você acesse o projeto através de um domínio amigável no seu navegador.

---

### 3️⃣ Inicializando o projeto e o banco de dados

Agora, inicialize o projeto e crie o banco de dados executando o comando Artisan fornecido pelo Laravel Sail.

```bash
./vendor/bin/sail artisan init
```

Este comando irá:
- Configurar o ambiente.
- Criar as tabelas e realizar as migrações necessárias para o funcionamento do banco de dados.

---

### 4️⃣ Acessando o projeto no navegador

Se tudo ocorreu bem até aqui, o seu projeto Laravel está configurado e funcionando. Agora, basta acessar no seu navegador o seguinte endereço:

```bash
http://local.api.forecast.com.br
```

---

## 🎉 Tudo pronto!

Agora que o ambiente está rodando, você pode começar a desenvolver e explorar seu projeto Laravel. Caso tenha algum problema, verifique os logs do Docker e certifique-se de que todas as etapas foram seguidas corretamente.

---

## 🔧 Comandos Úteis

- **Subir o ambiente**:
  ```bash
  ./vendor/bin/sail up -d
  ```

- **Parar o ambiente**:
  ```bash
  ./vendor/bin/sail down
  ```

- **Acessar o container via shell**:
  ```bash
  ./vendor/bin/sail shell
  ```

---

## 📄 Licença

Este projeto está licenciado sob os termos da [MIT License](LICENSE).

---

### 💻 Feito por Filipe Port
