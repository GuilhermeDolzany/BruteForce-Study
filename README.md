Entendi o que aconteceu. Quando você copia e cola de algumas interfaces, o Markdown acaba vindo com blocos de texto "sujos" (como as palavras Bash ou Plaintext escritas antes dos códigos), além de perder a formatação de listas e cabeçalhos.

Aqui está o arquivo limpo, pronto para ser colado no seu README.md. Ele já está no padrão correto que o GitHub renderiza:
Brute Force Tool - Laboratório de Autenticação Web
Descrição

Este projeto consiste em um script em Python desenvolvido para simular ataques de força bruta (Brute Force) em formulários de autenticação web. O objetivo é demonstrar, em ambiente controlado, como tentativas automatizadas de login funcionam e como mecanismos de defesa podem ser aplicados.

A ferramenta utiliza conexões persistentes para melhorar a eficiência das requisições HTTP durante o processo de autenticação.
Objetivos da Atividade

    Compreender o funcionamento de autenticação web baseada em sessão.

    Simular tentativas de força bruta em ambiente controlado.

    Analisar impactos de ataques automatizados.

    Estudar técnicas básicas de mitigação.

    Praticar conceitos de segurança ofensiva com responsabilidade.

Estrutura do Projeto
Plaintext

.
├── main.py            # Script principal da ferramenta
├── .gitignore         # Arquivos ignorados pelo Git
├── app/               # Aplicação web alvo (PHP)
│   ├── login.php
│   └── dashboard.php
└── wordlists/         # Dicionários de dados
    ├── usuarios.txt
    └── senhas.txt

Requisitos
Software

    Python 3.8 ou superior

    Servidor Web (Apache ou Nginx)

    PHP 7.0 ou superior

    Sistema Operacional Linux (Recomendado)

Dependências Python

Instale a biblioteca necessária via terminal:
Bash

pip install requests

Passo a Passo para Execução
1. Configuração do Ambiente Alvo

Hospede os arquivos da pasta app/ no seu servidor local. No Linux (Apache):
Bash

sudo cp -r app/* /var/www/html/
sudo systemctl start apache2

A aplicação deverá estar acessível em: http://127.0.0.1/login.php
2. Preparação das Wordlists

Configure os arquivos em wordlists/. Exemplo:

usuarios.txt
Plaintext

admin
user
teste

senhas.txt
Plaintext

123456
password
admin123

3. Execução da Ferramenta

No diretório raiz do projeto, execute:
Bash

python3 main.py

Funcionamento

O script utiliza requests.Session() para otimizar o ataque através das seguintes etapas:

    Leitura das Wordlists: Carregamento dos dados para a memória.

    Combinação de Credenciais: Teste exaustivo de cada usuário contra cada senha.

    Requisição Persistente: Envio de POSTs mantendo o handshake HTTP ativo.

    Validação: Busca por strings de sucesso (ex: "Desconectar") na resposta.

    Finalização: Interrupção total ao encontrar um par válido.

Possíveis Melhorias

    Paralelismo: Uso de threading para múltiplas tentativas simultâneas.

    Furtividade: Rotação de cabeçalhos User-Agent.

    Segurança: Captura de CSRF Tokens.

    Resiliência: Detecção de Rate Limiting (Status 429).

    Análise: Exportação de logs em JSON ou CSV.

Aviso Legal

Este software foi desenvolvido exclusivamente para fins acadêmicos e educacionais. O uso desta ferramenta é permitido apenas em:

    Ambientes locais de desenvolvimento.

    Laboratórios de segurança controlados.

    Sistemas com autorização explícita e por escrito dos proprietários.

O uso não autorizado contra sistemas de terceiros é ilegal e viola as leis de segurança da informação vigentes. O autor não se responsabiliza pelo uso indevido deste código.
