# Order Form
Learning challenge from BeCode

****

## 🌱 Must-have features

### Let's Prepare:
- [x] So first we'll have a look at the provided structure, we got an index.php file and a file called form-view.php (a file that contains a form). Now look how they are working together.
- [x] Next we need to think of a funny/surprising/original name for our store. Something that in our opinion should definitely exist. For example, fancy suits for cats, bongo for dates, etc.
- [x] Then we think of some products to sell and update the products array.
- [x] Last step, check if all the products & prices are currently visible in the form.

### Step 1 / Accepting orders
- [x] When the user submits the form, an order confirmation is shown. It should contain all the chosen products and the delivery address.
- We will learn how to save all this information to a database later on, so we don't need to do it at this step.

### Step 2 / Validation
- We will use PHP to check the following:
  - [x] Required fields are not empty
  - [x] Zip code are only numbers
  - [x] Email address is valid
- [x] Show any problems (like empty or invalid date) with the fields at the top of the form. We can use the [bootstrap alerts](https://getbootstrap.com/docs/4.0/components/alerts/) for inspiration. If they are valid, the confirmation of step 1 is shown.
- [ ] If the form was not valid, show the previous values in the form so that the user doesn't have to retype everything.

### Step 3 / Improve U(ser)(e)X(perience) by saving user data
- [x] Check out the possibilities of the PHP session and cookies.
- [ ] We want to prefill the address (you can just use any previous user input, we don't need to get data from anywhere else), as long as the browser isn't closed. Which of these techniques is the better choice here?
  > I think in our case it's best to work with Sessions.

Let's look up some information about what php session and cookies actually are:
#### PHP Sessions
- A session is a way to store information (in variables) to be used across multiple pages. Unlike a cookie, the information is not stored on the users computer.
- Session variables hold information about one single user, and are available to all pages in one application.
- A session is started with the session_start() function.
- Session variables are set with the PHP global variable: $_SESSION.
- Some more explanation and examples on Session you can find [here](https://www.phptutorial.net/php-tutorial/php-session/)

#### PHP Cookies
- A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too.
- A cookie is created with the setcookie() function.
- Syntax:
```setcookie(name, value, expire, path, domain, secure, httponly);```
- Some more explanation [here](https://www.phptutorial.net/php-tutorial/php-cookies/)


> When you use cookies on a live site, be sure to check any legal requirements.

***

## 🌼 Nice-to-have features (doable)

### Step 1 / Expanding due to success
- [ ] Read up on `get` variables and what you can do with it.
- [ ] Find commented navigation and activate it. Tweak the content for our own store.
- [ ] Make a second category of products, and provide a new array for this information.
- [ ] The navigation should work as a toggle to switch between the two categories of products.

### Step 2 / Orders in bulk
- [ ] We want to allow our user to specify how much he or she wants to buy of a certain product.

### Step 3 / The look & feel
- [ ] Let's think about what kind of style we want for our store. Add a color scheme and a suitable font.
- [ ] Check what you can do for validation with html and JS. Use this to improve our validation.

***

## 🌳 Nice-to-have features (hard)

### Step 1 / Delivery times
- [ ] Show the expected delivery time in the confirmation message (2h by default).
- [ ] A user can have the option for express delivery ($5 for delivery in 45 minutes).

### Step 2 / Statistics
- [ ] Show statistics about how much money has been spent. This info should be kept (can you use the session or cookies for this?) when the browser closes.
- [ ] Include the most popular product (by this user) and amount of products bought by this user.