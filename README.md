# Heptagon
Heptagon is a extra small PHP7 framework. It aims at providing the most basic toolset for an application and orienting development towards good practice.
It is currently in very early development and should not be used in this state.

## Planned Features
- Basic route management
- View management with modular Component based content building
- Controller based logic and data implementation
- Database abstraction
- Template engine
- Flexible theme/skin specification
- Automatic and configurable API exposer
- Application Events
- Event based plugin integration
- Component and Controller cache
- More to come if new features appear to be necessary ...

### Basic route management
Route management allows us to choose which View to expose depending on the HTTP request and the HTTP verb.
This will allow us to define View rules for (at the very least) the GET, PUT, POST and DELETE verbs.

### Views
Views are scripts that build the hierarchy of Components and attach them to the application. They also declare Controllers.

### Components
Components handle the way content is presented. They can have children Components in order to build complex hierarchies. They are also able to query data from Controllers in order to present dynamic information.
Some uses of Components :
- Implement modular and reusable blocks of HTML that do not depend on their upper hierarchy or their content
- Abstraction of underlying hierarchy with prefabricated Component trees
- ...

Heptagon provides an abstract `Component` class that defines the behaviour for adding and accessing subcomponents, as well as an abstract `run()` method.
To create a new type of component, one would extend the `Component` class and override the `run()` method to implement the actual behaviour. This method should return a `Node` object representing the content to be displayed. 
Subclasses of `Node` implement functionality to generate an output string.

This example Component will display a given string as a HTML `<h1>`. Here we use `HtmlNode` combined with `TextNode` to create a usable return object.

```php
class PageTitle extends Component {

    private $content;

    /*
     * Implement a constructor to pass a custom content
     */
    public function __construct(string $content) {
        $this->content = content;
    }
    
    /*
     * Build its own output and returns it.
     */
    public function run(App $app) {
        $container = new HtmlNode('h1');                      // Create an HTML <h1>
        $container.addChild(new TextNode($this->content));    // Insert text
        return $container;                                    // Return it back to the calling Component
    }
}
```

### Controllers
Controllers manage data and expose it to the Components, so that these can in turn present the final content.
Such data can come from a database, an external API or even be generated on the fly.
They allow us to implement the logic of our app.
For example, the `SessionStorage` Controller is an abstraction of the php `$_SESSION`. It encapsulates it and can be extended to provide controlled access to it.

### Database abstraction
Its primary goal is to provide a configurable interface to expose database storage in an Object-Oriented fashion.
It allows us to define behaviours for fetching, updating and creating database entries and provides basic functionality.
