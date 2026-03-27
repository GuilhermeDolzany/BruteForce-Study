# Brute Force Tool - Laboratório de Autenticação

## Descrição
Este projeto consiste em um script em Python desenvolvido para simular ataques de força bruta (Brute Force) em formulários de autenticação web. O objetivo é demonstrar, em ambiente controlado, como tentativas automatizadas de login funcionam e como mecanismos de defesa podem ser aplicados.

A ferramenta utiliza conexões persistentes para melhorar a eficiência das requisições HTTP durante o processo de autenticação.

---

## Objetivos da Atividade
- Compreender o funcionamento de autenticação web baseada em sessão
- Simular tentativas de força bruta em ambiente controlado
- Analisar impactos de ataques automatizados
- Estudar técnicas básicas de mitigação
- Praticar conceitos de segurança ofensiva com responsabilidade

---

## Estrutura do Projeto

.
├── main.py
├── app/
│ ├── login.php
│ └── dashboard.php
└── wordlists/
├── usuarios.txt
└── senhas.txt


### Descrição dos Arquivos
- `main.py` → Script principal da ferramenta
- `app/` → Aplicação web vulnerável para testes
- `wordlists/` → Dicionários de usuários e senhas

---

## Requisitos

### Software
- Python 3.8 ou superior
- Servidor Web (Apache ou Nginx)
- PHP 7.0 ou superior
- Sistema Operacional Linux (recomendado)

### Dependências Python
- requests

Instalação:
```bash
pip install requests
Passo a Passo para Execução
1. Configuração do Ambiente Alvo

Hospede os arquivos da pasta app/ em um servidor web com suporte a PHP.

Exemplo utilizando Apache:

sudo cp -r app/* /var/www/html/

Inicie o servidor:

sudo systemctl start apache2

O sistema deverá estar acessível em:

http://127.0.0.1/login.php
2. Preparação das Wordlists

Edite os arquivos dentro da pasta wordlists/.

usuarios.txt

admin
user
teste

senhas.txt

123456
password
admin123
3. Execução da Ferramenta

No diretório raiz do projeto, execute:

python3 main.py

O script iniciará as tentativas de autenticação utilizando sessões HTTP persistentes.

Funcionamento

A ferramenta realiza as seguintes etapas:

Leitura das wordlists
Combinação usuário e senha
Envio de requisição POST
Verificação da resposta do servidor
Identificação de login válido

A conexão é mantida usando Session, reduzindo o overhead de handshake HTTP.

Resultados Esperados
Identificação de credenciais válidas
Visualização de tentativas automatizadas
Observação do comportamento do servidor
Compreensão da importância de proteção contra brute force
Possíveis Melhorias
Implementação de threading (paralelismo)
Rotação de User-Agent
Suporte a CSRF Token
Detecção de rate limiting
Exportação de logs (JSON/CSV)
Delay configurável entre requisições
Interface CLI com argumentos
Aviso Legal

Este software foi desenvolvido exclusivamente para fins acadêmicos e educacionais.

O uso desta ferramenta é permitido apenas em:

Ambientes locais
Laboratórios controlados
Sistemas com autorização explícita

O uso não autorizado contra sistemas de terceiros pode violar leis de segurança da informação.

Contexto Acadêmico

Este projeto foi desenvolvido como atividade prática para estudo de:

Segurança de aplicações web
Autenticação HTTP
Testes de penetração básicos
Automação em Python
Segurança ofensiva
Conceitos Abordados
Brute Force
HTTP Session
Autenticação Web
Requests POST
Wordlists
Automação de testes
Segurança ofensiva
