# 1. Clone o repositório
git clone https://github.com/seuusuario/seuprojeto.git

cd seuprojeto

# 2. Instale as dependências PHP
composer install

# 3. Instale as dependências do Node (se usar front ou Vite, opcional)
npm install

# 4. Copie o arquivo .env.example para .env
cp .env.example .env

# 5. Gere a APP_KEY (chave do Laravel)
php artisan key:generate

# 6. Ajuste as configurações do seu banco no arquivo .env
# (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

# 7. Rode as migrations (para criar as tabelas)
php artisan migrate

# 8. (Opcional) Rode seeds/factories se precisar de dados de teste
php artisan db:seed
