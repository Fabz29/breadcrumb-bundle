**Fabz 29 Breadcrumb Bundle** is a **Symfony Bundle** created to be the most simple unique way to manage breadcrumb. 
You don't have several option just one and just one way to do ! That's simple isn't ?

Installation
------------

####Step 1 : 
* require fabz29/breadcrumb-bundle

#### Step 2 : Add the bundle to your AppKernel.php

``` php
// config/bundles.php
    ...
    Fabz29\BreadcrumbBundle\Fabz29BreadcrumbBundle::class => ['all' => true],
```

#### Step 3 : Configure the bundle

``` yaml
// config/packages/fabz29_breadcrumb.yaml
fabz29_breadcrumb:
    template: 'default/_breadcrumb.html.twig'
    home_route_name: 'Home'
    home_route: 'homepage'
    home_route_params: []
```
#### Step 4 [RECOMMENDED|OPTIONAL] : Overide the template

``` twig 
<ol class="breadcrumb hide-phone p-0 m-0">
    {% for link in breadcrumb.links %}
    <li class="breadcrumb-item">
        <a href="{{ path(link.route, link.routeParams ) }}">{{ link.name|trans({}, 'messages' }}</a>
    </li>
    {% endfor %}
</ol>

```

How to use it
-------------

- in your controller : 
    ``` php
        $breadcrumb = $this->get("fabz29_breadcrumb.breadcrumb.manager");
        $breadcrumb->addItem('Settings', 'user_settings');
    ```
    
- in your twig template where the fuc* you want : 
    ``` twig
        {{ fabz29_render_breadcrumb() }}
    ```

## TODO
- Add some tests
- Allow GET parameters not handle by routing component

## License

The bundle is developped by Fabien ZANETTI.
Licence MIT
