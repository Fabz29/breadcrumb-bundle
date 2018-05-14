**Fabz 29 Breadcrumb Bundle** is a **Symfony Bundle** created to be the most simple unique way to manage breadcrumb. 
You don't have several option just one and just one way to do ! That's simple isn't ?

Installation
------------

####Step 1 : 
* require fabz29/breadcrumb-bundle

#### Step 2 : Add the bundle to your AppKernel.php

``` php
// app/AppKernel.php

public function registerBundles()
{
  $bundles = array(
    // ...
        new Fabz29\BreadcrumbBundle\Fabz29BreadcrumbBundle(),
  );
}
```

#### Step 3 : Configure the bundle

``` yaml
// app/config/parameters.yml
parameters:
    fabz29_breadcrumb:
        template: 'Front/Includes/breadcrumb.html.twig'
        home_route_name: 'Accueil'
        home_route: 'app_main_homepage'
        home_route_params: {}
```

``` yaml
// app/config/services.yml
imports:
    - { resource: "@Fabz29BreadcrumbBundle/Resources/config/services.yml" }
```

#### Step 4 : Enable manager in Twig

``` yaml
// app/config/config.yml
twig:
    globals:
        breadcrumb_manager: '@fabz29_breadcrumb.breadcrumb.manager'
```

``` yaml
// app/config/services.yml
imports:
    - { resource: "@Fabz29BreadcrumbBundle/Resources/config/services.yml" }
```

#### Step 5 [RECOMMENDED|OPTIONAL] : Overide the template

``` twig 
// Path/To/Your/TwigTemplate
{% if breadcrumb_manager.getBreadcrumb is not null or breadcrumb is defined %}
    <ul>
        {% foreach link in breadcrumb.links %}
        <li>
            <a href="{{ path(link.route, { link.routeParams }) }}">{{ link.name|raw }}</a>
        </li>
        {% endfor %}
    </ul>
{% endif %}
```

How to use it
-------------

- in your controller : 
    ``` php
        // if you have already configure the home link in your parameters you just need to add some next item
        $breadcrumbManager = $this->get('fabz29_breadcrumb.breadcrumb.manager');
        
        // your next items
        $breadcrumbManager->addItem('yourLinkName', 'your_route_name', array('yourKeyRouteParam' => 'yourValueRouteParam');
        $breadcrumbManager->addItem(...);
        
        // you don't need to give the breadcrumb in your twig template
    ```
    
- in your twig template where the fuc* you want : 
    ``` twig
       
        // render the breadcrumb if you give the breadcrumb object
        {% include breadcrumb_manager.template %}
    ```

## TODO
- Add some tests
- Enable the installation by composer

## License

The bundle is developped by Fabien ZANETTI and can be used only by himself. 
Copyright Fabz29. All Rights reserved