
## Summary
- Docker Overview
    - base image
    - inherited image
    
- Create Basic Symfony Project
    - User Service
        - controller
        - database
            - set database URL            
            - environment variable
            - create database
            - generate migrations
            - SQL
            - generate entity
            - getter-setter entity
        
- Implement Into Existing Application
    - Store Service
        - user bundle
        
- Starting Services Individually
    - create database
    - run migrations

- Docker Compose
    - rebuild
    - integrate  
    
## Service Reference

### Catalogue

```
service name: catalogue-service
port: 8082
end points: 
    GET /product/{id}
    POST /product
        name
        price
        desc
```

### Shopping Cart
```
service name: shopping-cart
port: 8081
end points:
    GET /cart/{userId}
    POST /cart
        userId
        productId
```

### Store
```
service name: store-service
port: 8080
end points:
    GET /cart-value/{userId}    
```

### User
```
service name: user-service
port: 8083 
end points:
    GET /user/{userId}
    POST /user
        name
```

### Combined docker-compose
```
port: 80
/s/ -- store service
/c/ -- cart service
/p/ -- catalogue service
/u/ -- user service
```
        
        