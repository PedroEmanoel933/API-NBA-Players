# 🏀 API NBA Players

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![REST API](https://img.shields.io/badge/REST_API-02569B?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**API REST desenvolvida em PHP para gerenciamento de jogadores da NBA utilizando operações CRUD.**

</div>

---

## 📑 Índice

- [📖 Sobre o Projeto](#-sobre-o-projeto)
- [✨ Funcionalidades](#-funcionalidades)
- [🛠️ Tecnologias Utilizadas](#️-tecnologias-utilizadas)
- [📂 Estrutura do Projeto](#-estrutura-do-projeto)
- [📄 Licença](#-licença)
- [👨‍💻 Autor](#-autor)

---

## 📖 Sobre o Projeto

A **API NBA Players** é uma aplicação Back-End desenvolvida em PHP com o objetivo de disponibilizar uma API REST para gerenciamento de informações de jogadores da **NBA**.

O projeto permite realizar operações completas de **CRUD (Create, Read, Update e Delete)**, possibilitando o cadastro, consulta, atualização e remoção de jogadores armazenados em um banco de dados relacional.

A API foi desenvolvida seguindo os princípios da arquitetura REST, permitindo uma comunicação padronizada entre clientes e servidor por meio de requisições HTTP. Além disso, o projeto aplica uma organização estruturada do código utilizando o padrão **MVC (Model-View-Controller)**, promovendo maior legibilidade, manutenção e escalabilidade da aplicação.

---

## ✨ Funcionalidades

- ➕ Cadastro de novos jogadores da NBA (Create);
- 📄 Consulta de jogadores cadastrados (Read);
- 🔎 Busca de informações específicas de jogadores;
- ✏️ Atualização dos dados dos jogadores (Update);
- 🗑️ Exclusão de jogadores cadastrados (Delete);
- 💾 Armazenamento das informações em banco de dados relacional;
- 🔄 Comunicação entre cliente e servidor utilizando o padrão REST;
- 🏗️ Organização da aplicação utilizando arquitetura MVC.

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Finalidade |
|------------|------------|
| PHP | Desenvolvimento da API, regras de negócio e manipulação dos dados |
| Composer | Gerenciamento de dependências e carregamento automático de classes |

---

## 📂 Estrutura do Projeto

O projeto foi arquitetado utilizando o padrão **MVC (Model-View-Controller)**, separando as responsabilidades da aplicação e tornando o código mais organizado e escalável.

### Model

Responsável pela comunicação com o banco de dados e pelo gerenciamento das informações dos jogadores. Essa camada contém as regras relacionadas à manipulação dos dados, como criação, consulta, atualização e exclusão de registros.

### Controller

Realiza o gerenciamento das requisições recebidas pela API, fazendo a comunicação entre o cliente e a camada **Model**. É responsável por processar as solicitações, executar as operações necessárias e retornar as respostas adequadas.

### View

Como se trata de uma API REST, a camada de visualização é representada pelas respostas retornadas ao cliente, geralmente estruturadas no formato **JSON**, permitindo que diferentes aplicações consumam os dados disponibilizados pela API.

---

## 📄 Licença

Este projeto está licenciado sob a **MIT License**.

---

## 👨‍💻 Autor

Desenvolvido por **Pedro Emanoel**.
```
