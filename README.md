# Brute Force Tool - Laboratório de Autenticação Web

## Descrição
Este projeto consiste em um script em Python desenvolvido para simular ataques de força bruta (Brute Force) em formulários de autenticação web. O objetivo é demonstrar, em ambiente controlado, como tentativas automatizadas de login funcionam e como mecanismos de defesa podem ser aplicados.

A ferramenta utiliza conexões persistentes para melhorar a eficiência das requisições HTTP durante o processo de autenticação.

---

## Objetivos da Atividade
* Compreender o funcionamento de autenticação web baseada em sessão
* Simular tentativas de força bruta em ambiente controlado
* Analisar impactos de ataques automatizados
* Estudar técnicas básicas de mitigação
* Praticar conceitos de segurança ofensiva com responsabilidade

---

## Estrutura do Projeto

```text
.
├── main.py            # Script principal da ferramenta
├── .gitignore         # Configurações de arquivos ignorados pelo Git
├── app/               # Aplicação web vulnerável para testes
│   ├── login.php
│   └── dashboard.php
└── wordlists/         # Dicionários de usuários e senhas
    ├── usuarios.txt
    └── senhas.txt

Requisitos
Software

    Python 3.8 ou superior

    Servidor Web (Apache ou Nginx)

    PHP 7.0 ou superior

    Sistema Operacional Linux (Recomendado)

Dependências Python

    requests

Instalação:
Bash

pip install requests

Passo a Passo para Execução
1. Configuração do Ambiente Alvo

Hospede os arquivos da pasta app/ em um servidor web com suporte a PHP.

Exemplo utilizando Apache no Linux:
Bash

sudo cp -r app/* /var/www/html/

Iniciar o servidor:
Bash

sudo systemctl start apache2

A aplicação deverá estar acessível em: http://127.0.0.1/login.php
2. Preparação das Wordlists

Configure os arquivos dentro da pasta wordlists/ conforme necessário.

usuarios.txt:
Plaintext

admin
user
teste

senhas.txt:
Plaintext

123456
password
admin123

3. Execução da Ferramenta

No diretório raiz do projeto, execute o script:
Bash

python3 main.py

Funcionamento

O script utiliza a biblioteca requests.Session() para otimizar o ataque, realizando as seguintes etapas:

    Leitura das Wordlists: Carregamento dos arquivos de texto para memória.

    Combinação de Credenciais: Iteração entre usuários e senhas.

    Requisição Persistente: Envio de requisições POST mantendo o handshake HTTP ativo.

    Validação de Resposta: Verificação de strings de sucesso (ex: "Desconectar") no corpo do HTML retornado.

    Finalização: Interrupção imediata ao identificar um par de credenciais válido.

Resultados Esperados

    Identificação de credenciais válidas presentes nas wordlists.

    Visualização do log de tentativas automatizadas no terminal.

    Observação do comportamento do servidor alvo sob múltiplas requisições.

    Compreensão prática da importância de proteções contra ataques de força bruta.

Possíveis Melhorias

    Paralelismo: Implementação de threading para múltiplas tentativas simultâneas.

    Furtividade: Rotação de cabeçalhos User-Agent para evitar assinaturas simples.

    Segurança: Suporte para captura e envio de CSRF Tokens.

    Resiliência: Detecção automática de Rate Limiting (Status Code 429).

    Análise: Exportação de logs em formatos JSON ou CSV.

    Controle: Inclusão de delay configurável entre requisições e interface via argumentos CLI.

Aviso Legal

Este software foi desenvolvido exclusivamente para fins acadêmicos e educacionais.
O uso desta ferramenta é permitido apenas em:

    Ambientes locais de desenvolvimento.

    Laboratórios de segurança controlados.

    Sistemas com autorização explícita e por escrito dos proprietários.

O uso não autorizado contra sistemas de terceiros é ilegal e viola as leis de segurança da informação vigentes. O autor não se responsabiliza pelo uso indevido deste código.
