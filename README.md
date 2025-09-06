# Projeto

Projeto feito em Laravel utilizando seu componente nativo (Blade) junto do Breeze que trás nativamente o TailwindCSS.

## Tecnologias utilizadas no projeto

[Laravel](https://laravel.com/docs/12.x) <br>
[Docker](https://www.docker.com/) <br>
[MySQL](https://www.mysql.com/) <br>
[TailwindCSS](https://tailwindcss.com/) <br>

## Como iniciar o projeto

Clone o repositório

```sh
git clone -b https://github.com/josearildo2/Store-fake-stock.git
```

Acesse a pasta do projeto que foi clonada e instale as dependências necessárias do node
```sh
cd Store-fake-stock
npm install
```

Antes de subir os containers do docker, substitua o arquivo .env existente pelo .env.example
```sh
rm .env
mv .env.example .env
```

Agora suba os containers do docker com o comando do docker-compose (é necessário passar pela etapa anterior para a definição das variáveis de build)
```sh
docker-compose up -d --build
```

Certifique-se que o docker está funcionando corretamente e todos os containers rodando para prosseguir a configuração.

Acesse o container 'app' gerado pelo docker-compose e instale as dependências necessárias do container
```sh
docker exec -it store-fake-app bash
composer install
```

Por fim, execute o comando abaixo fora do conteiner para compilar o CSS do Tailwind corretamente.
```sh
exit
npm run dev
```

[localhost:8000](http://localhost:8000/) <br>