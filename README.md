# AprovaSP

## Configuração de ambiente em servidor Ubuntu 22.04

Requisitos:

- Apache 2.4
- MySQL 8
- PHP 8.1
- WordPress 6 com plugin Live Composer

### Instalação em VM rede interna

É necessário configurar o proxy caso o servidor esteja rodando na rede interna:

```shell
# Configuração do environment
http_proxy=http://usuario:senha@ipproxy:porta/
ftp_proxy=ftp://usuario:senha@ipproxy:porta/
https_proxy=https://usuario:senha@ipproxy:porta/

# Configuração do apt (/etc/apt/apt.conf.d/90curtin-aptproxy)
Acquire::http::proxy "http://usuario:senha@ipproxy:porta/";
Acquire::ftp::proxy "ftp://usuario:senha@ipproxy:porta/";
Acquire::https::proxy "https://usuario:senha@ipproxy:porta/";
```

Caso mesmo assim algum dos comandos apresentar timeout, utilizar a opção -E para forçar a utilização das variáveis de ambiente.

### Instalação do Apache

```shell
sudo apt-get install apache2

# Verificar se o firewall está habilitado, e caso esteja adicionar o Apache às excessões
sudo ufw status
sudo ufw app list
sudo ufw allow in "ApacheAll"

# Criar arquivo de configuração do site
sudo vim /etc/apache2/sites-available/aprovasp.conf

# Habilitar o site, e desabilitar a página padrão do Apache
sudo a2ensite aprovasp
sudo a2dissite 000-default

#Habilitar o Rewrite mod
sudo a2enmod rewrite

#Reiniciar o Apache
sudo systemctl restart apache2
```

### Instalação do MySQL 8

```shell
sudo apt-get install mysql-server

# Rodar o MySQL (senha padrão do root vazia)
mysql -u root -p

# Mudar a senha do usuário root
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'novasenha';

# Adicionar permissão de acesso remoto para o IP da sua máquina de trabalho
CREATE USER 'root'@'enderecoip' IDENTIFIED BY 'senha';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'enderecoip';

# Voltar ao terminal
exit

# Executar script de configuração de segurança do MySQL
sudo mysql_secure_installation

# Remover a opção 'bind-address' no arquivo de configuração
sudo vim /etc/mysql/mysql.conf.d/mysql.cnf
```

### Instalação do PHP 8.1

```
# Instalar os pacotes
sudo apt-get install php
sudo apt-get install libapache2-mod-php
sudo apt-get install php-mysql

# Adicionar repositório com build da versão mais atual do PHP
sudo apt install software-properties-common apt-transport-https
sudo add-apt-repository ppa:ondrej/php
sudo apt-get upgrade
```

### Instalação do WordPress:

- Baixar a versão mais recente em https://br.wordpress.org/download/ e extrair em `/var/www/aprovasp`.
- Instalar os tema do site em `./wp-content/themes/` e o CSS em `./css`.
- Adicionar as configurações do banco de dados em `./wp-config.php`.
- Instalar o plugin Live Composer, criar as respectivas páginas e utilizar a função "importar módulo" para inserir o conteúdo dos arquivos `.json` ao site.
