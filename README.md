<!-- ABOUT THE PROJECT -->
## About The Project

Console app built for the Light-it onboarding.

### Built With

* [PHP](https://www.php.net/docs.php)
* [Symfony](https://symfony.com/doc/current/index.html)
* [Docker](https://docs.docker.com/compose/)

<!-- GETTING STARTED -->
## Getting Started

### Installation
1. Clone the repo
   ```sh
   git clone https://github.com/maxpsz/movie-api-challenge.git
   ```
2. Update API_KEY env var (docker-compose.yml)
   ```sh
   API_KEY=replaceme 
   ```
   If you don't have one, request it on https://www.omdbapi.com/apikey.aspx

3. Run docker
   ```sh
   docker compose up -d
   ```
3. Connect to docker console
   ```sh
   docker compose exec php bash
   ```

### Usage
A. Normal
   ```sh
   ./moviepedia show <movieName>
   ```
B. With fullPlot
   ```sh
   ./moviepedia show <movieName> --fullPlot
   ```

   Can't came up with a movie name? Try: **scarface**.

## Credits

* [OMDb API](https://www.omdbapi.com/)
* [How to Build Command-Line Apps](https://laracasts.com/series/how-to-build-command-line-apps-in-php)
* [Aprende Docker ahora! curso completo gratis desde cero!](https://www.youtube.com/watch?v=4Dko5W96WHg)
