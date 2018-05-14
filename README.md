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
parameters:
    fabz29_breadcrumb:
        template: 'default/_breadcrumb.html.twig'
        home_route_name: 'Accueil'
        home_route: 'homepage'
        home_route_params: {}
```
#### Step 4 : Enable manager in Twig

``` yaml
// config/packages/twig.yaml
twig:
    globals:
        breadcrumb_manager: '@fabz29_breadcrumb.breadcrumb.manager'
```

``` yaml
// config/services.yaml
    # explicitly configure the service
    Fabz29\BreadcrumbBundle\Manager\BreadcrumbManager:
        arguments:
            $params: '%fabz29_breadcrumb%'
```

#### Step 5 [RECOMMENDED|OPTIONAL] : Overide the template

``` twig 
// Path/To/Your/TwigTemplate
{% if breadcrumb_manager.getBreadcrumb is not null %}
<ol class="breadcrumb">
    {% for link in breadcrumb_manager.getBreadcrumb.links %}
    <li class="breadcrumb-item">
        <a href="{{ path(link.route, link.routeParams ) }}">{{ link.name|raw }}</a>
    </li>
    <li class="breadcrumb-item active">
        Project
    </li>
    {% endfor %}
</ol>
{% endif %}
```

How to use it
-------------

- in your controller : 
    ``` php
    
    #Add use
    use Fabz29\BreadcrumbBundle\Manager\BreadcrumbManager;

    public function index(ProjectRepository $projectRepository, BreadcrumbManager $breadcrumbManager): Response
    {
        $breadcrumbManager->addItem('yourLinkName', 'your_route_name', array('yourKeyRouteParam' => 'yourValueRouteParam');
        $breadcrumbManager->addItem(...);
        // your next items
      
        // you don't need to give the breadcrumb in your twig template
    ```
    
- in your twig template where the fuc* you want : 
    ``` twig
       
        // render the breadcrumb if you give the breadcrumb object
        {% include breadcrumb_manager.template %}
    ```

## TODO
- Add some tests

## License

The bundle is developped by Fabien ZANETTI and can be used only by himself. 
Copyright Fabz29. All Rights reserved