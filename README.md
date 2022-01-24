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

## 7 - Repository Pattern

<p>
The repository pattern consists of adding a layer of classes that are in charge of accessing the data source and obtaining the different data models. <br>
From: https://dev.to/victoor/repository-pattern-in-laravel-it-s-worth-3mn4
</p>

## 8 - Lazy Collections

<p>
To supplement the already powerful Collection class, the LazyCollection class leverages PHP's generators to allow you to work with very large datasets while keeping memory usage low.

For example, imagine your application needs to process a multi-gigabyte log file while taking advantage of Laravel's collection methods to parse the logs. Instead of reading the entire file into memory at once, lazy collections may be used to keep only a small part of the file in memory at a given time <br>
From: https://laravel.com/docs/8.x/collections#lazy-collection-introduction
</p>