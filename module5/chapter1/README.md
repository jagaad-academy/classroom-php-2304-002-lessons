# Chapter Exercise

Create a simple API that reads and writes to the database. The routes should be the following:

#### Return all people from the database:
```
[GET] /people
```

Response example:
```json
[
  {
    "id": "22ee956d-6b1c-465c-8f23-eb7c57874796",
    "name": "John"
  }
]
```

#### Insert new person to the database:
```
[POST] /person
```

Payload example:
```json
{
  "name": "John"
}
```

## Exercise Requirements

1. Use Slim micro-framework.
2. The application MUST run on Docker containers.
3. The route to insert a new person MUST be protected by a JWT token.
4. The solution should be pushed into the repository containing all your exercises (no need for a new repository).
5. API Documentation is NOT REQUIRED.
6. [OPTIONAL] Try to use SPL features in the application.

