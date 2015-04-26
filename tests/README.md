# Setup & Mocks required

- A mock User model
- Seed mock User model
- Migrate notifications from package
- 

# Tests

- User 1 gets a notification from User 2 with the message "I liked your page" with the url "/page"
    + User 2 will have an unread notification from User 1
- User 2 visits "/page"
    + User 2 will now have a read notification from User 1

