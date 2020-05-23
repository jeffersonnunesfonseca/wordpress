FROM wordpress:5.4.1 as wp1


# Add WP-CLI 
RUN curl -o /bin/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
# COPY wp-su.sh /bin/wp
RUN chmod +x /bin/wp-cli.phar

# # Cleanup
# RUN apt-get clean
# RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*