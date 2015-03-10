# Government Budget Explorer

A SaaS platform for local budget sites like the [Asheville budget site](http://avlbudget.org) we built last year.

See the [wiki](https://github.com/DemocracyApps/GBE/wiki) for more details or come join the discussion at 
the [Open Budgets Project Discussion list](https://groups.google.com/forum/?hl=en#!forum/open-budgets-project).

To install and run using Vagrant, clone this project, navigate to the cloned directory and run:

    vagrant up
    vagrant ssh
    cd /var/www/
    sudo ./setup/setup.sh
    cd gbe
    ./artisan migrate --seed
    
