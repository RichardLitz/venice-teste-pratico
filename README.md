

# Sistema de Pesquisa

## Instalação

Execute os seguintes passos

- Renomeie o arquivo .env.local para .env

```bash
  docker compose up --build -d
  docker compose exec app composer install
  docker compose exec app npm i
  docker compose exec app npm run build
  docker compose exec app php artisan migrate --seed
```

## Executando comandas dentro do container

- Execute a aplicação em http://localhost:8000/produtos



## Tecnologias

- PHP v8.2.11
- Laravel v12.6.0
- Livewire 3.6
- Postgress DB
- Tailwind Css
- Node 20

## Documentações

- [Laravel 12](https://laravel.com/docs/12.x/releases "Laravel documentation")
- [Livewire](https://laravel-livewire.com/ "Livewire documentation")

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
