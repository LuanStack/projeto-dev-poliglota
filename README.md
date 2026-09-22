# Projeto Dev Poliglota 

Projeto prático desenvolvido para demonstrar a integração colaborativa entre diferentes linguagens de programação (PHP, Java e Python), utilizando o banco de dados MySQL como canal central de comunicação.

---

## Sobre o Projeto

O objetivo do sistema é simular o fluxo completo de cadastro, processamento de regra de negócio e emissão de relatórios de alunos divididos em três módulos independentes:

1. **Módulo 1 (PHP 8 + PDO):** Interface Web responsável pelo cadastro inicial do aluno com a matrícula no status `Pendente`.
2. **Módulo 2 (Java + JDBC):** Backend que lê os alunos pendentes no banco de dados, aplica a regra de negócio (converte o nome para caixa alta e gera o número de matrícula) e atualiza o registro.
3. **Módulo 3 (Python + Connector):** Script de terminal que consulta os dados consolidados e exibe o relatório gerencial dos alunos cadastrados e processados.

---

## Tecnologias Utilizadas

* **PHP 8** (com extensão `pdo_mysql`)
* **Java** (JDK 11+ com driver `MySQL Connector/J`)
* **Python 3** (com pacote `mysql-connector-python`)
* **MySQL** (gerenciado via XAMPP / phpMyAdmin)
* **Tailwind CSS** (via CDN para estilo da interface Web)
* **Git & GitHub** (Versionamento de código)

---

##  Estrutura do Banco de Dados

Acesse o **phpMyAdmin** (`http://localhost/phpmyadmin`) e execute o script SQL abaixo para criar o banco de dados e a tabela do projeto:

```sql
CREATE DATABASE sistema_poliglota;
USE sistema_poliglota;

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    curso VARCHAR(50),
    matricula VARCHAR(20) DEFAULT 'Pendente'
);