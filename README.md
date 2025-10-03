<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo">
</p>

# EasyBudget

> Aplicação Laravel pensada para gerenciar orçamentos pessoais.

## Requisitos

- PHP 8.3+
- Composer 2.8+
- Node.js 20+ e npm 10+
- Banco de dados compatível com Laravel (SQLite, MySQL, PostgreSQL etc.)

## Primeiros passos

1. Instale as dependências PHP:
	```bash
	composer install
	```
2. Copie o arquivo de ambiente e gere uma chave segura:
	```bash
	cp .env.example .env
	php artisan key:generate
	```
3. Ajuste o banco de dados no `.env`. Por padrão, usamos SQLite apontando para `database/database.sqlite`. Caso queira MySQL/PostgreSQL, basta trocar as variáveis `DB_*`.
4. Execute as migrações e, se necessário, seeds iniciais:
	```bash
	php artisan migrate
	```
5. Instale as dependências front-end e suba o ambiente de desenvolvimento:
	```bash
	npm install
	npm run dev
	```
6. Levante o servidor da aplicação:
	```bash
	php artisan serve
	```

## Testes

Rode a suíte de testes automatizados para garantir que tudo está funcionando:

```bash
php artisan test
```

## Estrutura do projeto

- `app/` — Código da aplicação (HTTP, Console, Models, etc.).
- `config/` — Arquivos de configuração.
- `database/` — Migrações, factories e seeders.
- `resources/` — Views Blade, componentes Vue/React e assets front-end.
- `routes/` — Definição das rotas web, API e console.
- `tests/` — Testes automatizados (Feature e Unit).

## Próximos passos sugeridos

- Definir o modelo de dados para categorias, transações e orçamento.
- Implementar autenticação e fluxos de cadastro/login.
- Criar páginas iniciais e componentes para acompanhar despesas e receitas.

## Licença

Este projeto é distribuído sob a licença [MIT](LICENSE).
