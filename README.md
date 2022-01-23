# Advanced Laravel

## 1 - Service Container

<p>
The Laravel service container is a powerful tool for managing class dependencies and performing dependency injection. Dependency injection is a fancy phrase that essentially means this: class dependencies are "injected" into the class via the constructor or, in some cases, "setter" methods.
</p>

## 2 - View Composer

<p>
View composers are callbacks or class methods that are called when a view is rendered. If you have data that you want to be bound to a view each time that view is rendered, a view composer can help you organize that logic into a single location. View composers may prove particularly useful if the same view is returned by multiple routes or controllers within your application and always needs a particular piece of data.
</p>

## 3 - Polymorphic relantionships

<p>
A polymorphic relationship allows the child model to belong to more than one type of model using a single association. For example, imagine you are building an application that allows users to share blog posts and videos. In such an application, a Comment model might belong to both the Post and Video models.
</p>

## 4 - Facades

<p>
Laravel facades serve as "static proxies" to underlying classes in the service container, providing the benefit of a terse, expressive syntax while maintaining more testability and flexibility than traditional static methods.
</p>

## 5 - Macros

<p>
Macro is a powerful feature of the Laravel framework. Laravel Macros allow you to add custom functionality to internal Laravel components. <br>
From: https://dzone.com/articles/how-to-use-laravel-macro-with-example
</p>


## 6 - Pipelines Pattern

<p>
Pipeline is a design pattern specifically optimized to handle stepped changes to an object. Think of an assembly line, where each step is a pipe and by the end of the line, you have your transformed object. <br>
From: https://dev.to/abrardev99/pipeline-pattern-in-laravel-278p
</p>