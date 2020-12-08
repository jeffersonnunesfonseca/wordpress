FROM wordpress:5.4.1 as wp1


# Add WP-CLI 
RUN curl -O /bin/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x /bin/wp-cli.phar
