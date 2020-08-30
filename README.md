# Solução Aldir Blanc
O intuito deste repositório é facilitar o deployment da plataforma [Mapas Culturais](https://github.com/mapasculturais/mapasculturais) como solução para os cadastros da Lei Aldir Blanc, assim como servir de ambiente de desenvolvimento do [Plugin AldirBlanc](https://github.com/mapasculturais/plugin-AldirBlanc), submódulo deste repositório.

Este repositório já utiliza como autenticador o plugin MultipleLocalAuth.


## Estrutura de arquivos
- **compose**
    - **common** - arquivos comuns dos ambientes de desenvolvimento e produção
    - **local** - arquivos exclusivamente para o ambiente de desenvolvimento
    - **production** - arquivos exclusivamente para o ambiente de produção
- **dev-scripts** - scripts auxiliares para o desenvolvimento
    - **start-dev.sh** - script que inicializa o ambiente de desenvolvimento
    - **bash.sh** - entra no container da aplicação
    - **shell.sh** - entra no shell do mapas culturais
    - **psql.sh** - entra no banco de dados da aplicação
    - **docker-compose.local.yml** - arquivo de definição do docker-compose utilizado pelos scripts acima
- **plugins** - pasta com os plugins desenvolvidos exclusivamente para o projeto
    - **AldirBlanc** - plugin que implementa os formulários de cadastro do inciso I e II da Lei Aldir Blanc
- **themes** - pasta com os temas desenvolvidos exclusivaente para o projeto
    - **SampleTheme** - esqueleto de tema filho do BaseV1 para demostração e para servir de base para o desenvolvimento de outros temas

## Guia rápido para início de novo projeto
Antes de tudo certifique-se de ter os pacotes _git_, _docker_ e _docker-compose_ instalados e estar utilizando sistema operacional Linux ou MacOS. 

_Nos exemplos é usado o comando sudo para que os scripts tenham os privilégios requeridos pelo docker._

### Criando repositório do projeto
Crie um repositório vazio no github ou gitlab (usarei de exemplo o nome _https://github.com/organizacao/meu-mapas_)

Clone o repositório do projeto base no seu computador
```
$ git clone https://github.com/mapasculturais/mapasculturais-aldirblanc.git meu-mapas --recursive 
$ cd meu-mapas
```

Substitua a url do remote origin para a url de seu repositório
```
meu-mapas/$ git remote set-url origin https://github.com/organizacao/meu-mapas

# ou, se você tiver sua chave no github
meu-mapas/$ git remote set-url origin git@github.com:organizacao/meu-mapas

```

Dê git push no repositório para enviar a versão inicial para seu repositório vazio.
```
meu-mapas/$ git push
To github.com:organizacao/meu-mapas
 * [new branch]      master -> master

```

### Ambiente de desenvolvimento

#### Iniciando o ambiente de desenvolvimento
Para subir o ambiente de desenvolvimento basta entrar na pasta `dev-scripts` e rodar o script `start-dev.sh`.

```
meu-mapas/dev-scripts/$ sudo ./start-dev.sh
```

acesse no seu navegador http://localhost:8080/

#### psysh
Este ambiente roda com o built-in web server do PHP, o que possibilita que seja utilizado o [PsySH](https://psysh.org/]), um console interativo para debug e desenvolvimento. 

no lugar desejado, adicione a linha `eval(\psy\sh());` e você obterá um console. `Ctrl + D` para continuar a execução do código.

#### Parando o ambiente de desenvolvimento
Para parar o ambiente de desenvolvimento usar as teclas `Ctrl + C`

## Usuário super administrador da rede
O banco de dados inicial inclui um usuário de role `saasSuperAdmin` de **id** `1` e **email** `Admin@local`.
Este usuário possui permissão de criar, modificar e deletar qualquer objeto do banco.

- **email**: `Admin@local`
- **senha**: `mapas123`

## Criando um novo tema
Usaremos para exemplo o nome de tema `NovoTema`

1. copie a pasta `themes/SampleTheme` para `themes/NovoTema`;
```
meu-mapas/themes$ cp -a SamplesTheme NovoTema
```
2. edite o arquivo `dev-scripts/docker-compose.yml` adicionando uma linha na seção _volumes_ para o tema:
```
    - ../themes/NovoTema:/var/www/html/protected/application/themes/NovoTema
```
3. edite o arquivo `themes/NovoTema/Theme.php` e substitua o namespace (linha 2) por `NovoTema`:
```+PHP
<?php
namespace NovoTema;
```


## Deployment para produção
@todo

### Configurações
@todo

### Inicializando os serviços
@todo
```
meu-mapas$ sudo docker-compose -f docker-compose.prod.yml up
```

### Atualizando o Mapas Culturais
Modifique a versão do Mapas Culturais no início do arquivo `compose/production/Dockerfile` e execute os comandos abaixo:
```
meu-mapas$ sudo docker-compose -f docker-compose.prod.yml build
meu-mapas$ sudo docker-compose -f docker-compose.prod.yml restart mapasculturais
```

### TLS / HTTPS
@todo

#### Let`s Encrypt
@todo
