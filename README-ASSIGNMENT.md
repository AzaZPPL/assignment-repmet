## How to test the code
1. Start the Docker containers; `docker compose up -d`
2. Install composer packages; `docker compose exec app composer install`
3. Run your tests; `docker compose exec app vendor/bin/phpunit .`
4. Profit!
5. Bonus: Run the code in your browser; `docker compose exec app php -S 0.0.0.0:8080 -t public/`

### Time needed to complete the assignment:
- 1 hour to do pretty much all the layout and the basic functionality
- Bonus 30 minutes for the index.php
