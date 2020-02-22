# LHTML5 Standards
The LHTML5 (Living Hypertext Markup Language 5) is a powerful and flexible way to build dynamic web pages.

## Syntax
HTML (hypertext markup language) is a standard for marking up pages to display in the browser that defines the order in which markup must or can appear in a web page. The LHTML5 is, in may ways, a simple extension of that standard. Although LHTML5 syntax can appear exactly the same as an HTML5 document, on the surface it more often looks like an oversimplified and somewhat embellished HTML5 document. The over simplicity stems from LHTML5 modules being able to alter the document and automate redundant elements. The embellished looks come from custom elements that are used to instantiate modules. 

### Example Document
An unparsed LHTML5 document basic syntax of is illustrated below. This example shows the use of four Modules that are instantiated using the `<html>`, `<block>`, `<news>` and `<footer>` elements. The `<html>` element invokes a module that adds a `<head>` tag. The `<block>` tag inserts a navigation bar. The `<h1>` element remains uninitiated. The `<news>` element pulls up to 20 news stories and display them with a thumbnail. The `<footer>` section is automatically populated.   

```html5
<html>
    <block name="NavBar" style="light"/>
    <h1>News &amp; Events</h1>
    <news>
        <arg name="limit">20</arg>
        <arg name"style">thumnail</arg>
    </news>
    <footer/>
</html>
```

### Modules
As demonstrated in the above example, Modules are instantiated as object from elements. Not all elements are parsed. Only Modules defined in the parser config are turned to objects. The rest remain as is (as is the case with the `<h1>` tag in the above example). A module can either be placed using an existing HTML5 element or a custom element. 
```html5
<block/>
```

#### Construction
The parser's config defines the `xpath` expression and `class_name` used to find elements and instantiate them as modules. That `class_name` may use the element's attributes as variables to resolve the class. Depending on the config, the following may show an example of a module that is instantiated as the either the class `Modules/Block/Test` or `Modules/Block`.

```html5
<block name="Test"/>
```

## `args`
During runtime the parser takes specified elements and instantiates them as objects. The element can feature arguments that are passed to the Module as properties. An argument's purpose is to be passed as a parameter, used by a module's method.

### Arguments from Derived Attribute 
Arguments can be added as attributes within an element. The following is an example of an argument `limit` being set to 1.
```lhtml5
<block name="Test" limit="1"/>
```

### Arguments from Child Arguments
Using arguments in the form of attributes has its limitations. Arguments can also be added as a children of the element using the `arg` element. In the following example, `block` features an arg named `min` set to a value of 0 and an arg `limit` set to a value of 1. 
```lhtml5
<block name="Test">
    <arg name="min">0</arg>
    <arg name="limit">1</arg>
</block>
```
### Array Arguments
When multiple arguments are passed using the same name it creates an argument array. The following arg `type` contains an array with three values: pickles, ketchup, and mustard.
```lhtml5
<block name="Test">
    <arg name="type">pickles</arg>
    <arg name="type">ketchup</arg>
    <arg name="type">mustard</arg>
</block>
```

## Modules
### Nested Modules
Modules can be nested inside one another. The following shows an example of a `var`, which is short for variable, module nested inside a `block` module.
```html5
<block name="UserProfile">
    <var name="fist_name"/>
</block>
```

#### Module Ancestor Properties
+ Modules can access their own private variables. 
+ Modules can access their ancestors public variables.

```HTML
 <div id="1">
 	<div id="2">
 		<div id="3"/>
 	</div>
 	<div id="4">
 		<div id="5"/>
 	</div>
 </div>
```
If `div` were a module in the above example, the following would be true:
* Module with id #1 can access no other Module public properties. 
* Module with id #2 can access module #1 public properties.
* Module with id #3 can access modules #1 and #2 public properties.
* Module with id #4 can access module #1 public properties.
* Module with id #5 can access modules #4 and #1 public properties.

## Module Methods
The config defines method calls to be orchestrated against all the modules instantiated. The methods can differ project to project but it stands to reason that one of the last ones will render the output from the module and its content will replace the original element entirely.

## Well-Formatted
LHTML5 is a well-formatted markup scripting language; Coldfusion is not. In ColdFusion items like <cfelse> in <cfif><cfelse></cfif> are not open and closed meaning it is not well-formatted. 

## Customizable Tags
The LHTML5 design encourages the create of Module, such as navbar, rather than building a 10 layer deep statement of conditions. Unlikely ColdFusion, LHTML5 relies less on large nested objects that can be hard to read.

Coldfusion limits developers to a set of prebuilt tags. In LHTML5 any tag can be used. And pre-exist HTML5 tags can be enhanced or transformed. For example, with LHTML5 for accessibility compliance, the alt attribute could be set to decorator when missing from img elements.