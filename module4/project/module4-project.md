# Module 4 Project

Create a REST API to handle requests for a blog post. For example, suppose this blog will have a front end separated from the back end, and you will be responsible for developing the back end (Web API). So, the routes would be delivered to the front-end developer.

## Requirements

1. As a user, I want to have routes to create, read, update, and delete posts.
2. As a user, I want to include a thumbnail when creating a new post. 
3. As a user, I want to have routes to create, read, update, and delete post categories.
4. As a user, I want to also have a route to return the post by the [slug](https://github.com/cocur/slugify).
5. As a user, I want to add one or more categories to a post (many posts have many categories).
6. As a user, I want to have the API documentation.

## Database Table Structure

The tables should contain at least the following fields (not limited to):

```
posts:
  - id
  - title
  - slug
  - content
  - thumbnail
  - author
  - posted_at

posts_categories:
  - id_post
  - id_category

categories:
  - id
  - name
  - description
```

## JSON Response Example

The JSON response when I send a (GET) request to retrieve the post data should be **similar** (not necessary the same) as the following one:

```json
{
  "id": "855a0350-96e7-4fef-8dc2-44b530209a72",
  "title": "All the Easter Eggs in PHP",
  "slug": "php-easter-eggs",
  "content": "PHP used to pack quite a few Easter Eggs back in the day. Until PHP 5.5, calling a URL with a special string returned various bits of PHP information and images such as the PHP logo, credits, Zend Engine logo, and a quirky PHP Easter Egg logo.",
  "thumbnail": "http://localhost:8889/thumbnails/855a0350.png",
  "author": "A PHP Developer",
  "posted_at": "2023-02-01 17:30:01",
  "categories": [
    {
      "id": "77df24a1-c06b-4987-857d-a29e0d445fbf",
      "name": "php"
    },
    {
      "id": "6230f3a2-43ff-46cc-9e27-c1e873a4743e",
      "name": "curiosity"
    }
  ]
}
```

## Notes

It is not required to manage the user (auth). The main goal is to practice the module topics (e.g., Composer packages, Web API development, OOP, PDO, etc.). Start the application from scratch by yourself following the lessons examples; it is crucial for you to practice and understand how the application works. Attention to the file upload, as it is an API, should be sent using the Base64 format.

## Technical Requirements

1. Create a new GitLab repository (public).
2. The application should fully use the object-oriented paradigm.
3. Use the PHP packages or Slim.
4. Install and configure the PHP quality tools: PHPStan and PHP Code Sniffer.
5. The API documentation should use OpenAPI and Swagger.
6. Use PDO for database communication.
7. Create a README file explaining the application and how to set it up.
8. (Optional) Add PDO transaction when creating a new post.
9. (Optional) Add unit tests for the area of code you see it is possible to.
10. Review the lessons content (jump to the part you need to review).

## Deadline
