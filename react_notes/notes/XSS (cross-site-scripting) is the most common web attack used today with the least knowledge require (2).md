---
title: XSS (cross-site-scripting) is the most common web attack used today with the least knowledge require (2)
created: '2019-02-14T20:45:04.542Z'
modified: '2019-02-14T23:48:08.632Z'
---

XSS (cross-site-scripting) is the most common web attack used today with the least knowledge required from the attacker.
Each month, attacks get more complex, easier to run, and gain power to do more damage. Keeping all your machines up to date with the most advanced software is not enough. That’s because the vulnerability lies within the browser itself.

Let me explain:

The browser is like a file-explorer. So instead of opening your files to explore, you open up a browser to see files on other people’s computer. Usually if you double clicked a .html file in your native file explorer, you’d get a string of code. BUT, because you’re using a special file explorer, called a internet-browser, you’re getting a different version of the file, an interpreted version.

So with your new view of the html file, you start to allow for people to easily enter data into your file-system. For the ten people that made the internet, this was a more than acceptable option. But with good ideas comes mass consumption. And the spread of the internet outpaced that of developer’s attempts to control glaring security holes.

This problem was easily visible to anyone with little knowledge about how the internet works. More often than not, its just a kid clicking around to see how something operates. But fast-forward to a internet that’s been scaled faster than anything in the history of the world, and you’ll see even simple web exploits being executed on Facebook and Google with success.

With this new internet, comes common attack vector’s being caught in the wild more frequently, making it easy for researchers to figure out the best mitigation techniques. So it's imperative you make sure to guard against XSS, and this article will explain one common way of guarding against the attack using the programming language PHP.

When you choose a web-server, your first step is to choose the very (best)[https://hostingcanda.org] server that has the most recent version of PHP installed, along with having the most up-to-date security measures implemented right out of the box.

And PHP has securely made itself a cornerstone foundation of web development. With PHP's meterioc rise in popularity and usage, XSS attacks also rose in prominence. PHP has problably the most in-depth history with the attack vector(XSS), so long ago, they made many solutions to problems like XSS built-in to the actual langauge. There's no need to waste time writing a complex regular expression to handle it, just use the PHP built-in function on input and you can sleep soundly. 

The attack is usually inserted on the number one weakpoint for web-applications, the user input fields. 

Some examples of user input fields, on Facebook for instance, would be the login and password boxes. They are considered user input because the values like ‘username@email.com‘ are sent to a database, and then your screen is updated with information that the database pulls back.

An example of what the user authentication process would look like in PHP would be this.

<?php 
  $user_input_name = "username@email.com"
  $user_input_password = "user_password"
  
  $database = database()
  
  // Look for user input in database
  $look_for = $database->check_for_user($user_input_name, $user_input_password);
  
  if ($look_for) {
    return "loggedin.php" .  $user_input_name; 
  }
 
?>

This will return a view based off of your user input and whether the username and password combination was valid. If you are logged in, you will see the loggedin.php page, and the name that was inserted through the user input field. 

What XSS does is it takes advantage of the browser’s assumption that all user input is valid. But attackers abuse this trust by putting source code in the user input fields, hoping the browser will update the page with the code you just entered. For example, putting

<script type='application/javascript'>alert('xss');</script> in the user input box may update your view with the code snippet included. And in this instance, you’ll see a alert box appear. You now have made the website take an unauthorized action on your behalf, or more elegantly put, you own the site.

But there’s hope. Because it's very easy to guard against the attack with a handy php function called htmlspecialchars.

Its called like this.

php <?php htmlspecialchars($user_input, ENT_QUOTES, 'UTF-8');

This function ‘sanitizes’ the user input, no matter what it is. If you put code into a password field, this function will catch the input and turn dangerous characters into “special characters” that are interpreted by your browser as literal.

Without htmlspecialchars.

$user_input = "<script type='application/javascript'>alert('xss');</script>"

With htmlspecialchars.

$user_input = htmlspecialchars("&lt;script type='application/javascript'&gt;alert('xss');&lt;/script&gt;")

You can sort of see exactly what htmlspecialchars does to user input. It replaces all of the dangerous characters with ones that can be used to update your view. And the characters &lt&gt will be stored as such, but will display on your browser like < and > , ensuring safe storage and also a pleasurable experience for the end user. This simple method of ensuring clean user input is a great way to keep your site or web-application, safe and secure. 

This simple method of using PHP to combat XSS is a great way to keep your site or web-application, safe and secure. XSS is usually an attackers favorite tool in their arsenal because its executed very easily, but often not guarded against. Luckily, PHP had for-seen how XSS could be a problem, and they implemented a built in function to handle the issue.

In closing, XSS is one of the most prevalent attack vectors a website will see. Simple information like a username could be momentarily exposed, but also very personal information like credit card numbers, addresses, and family members names could be stolen by hackers.

Attackers can even high-jack a user’s session act like you on platforms like Facebook, Twitter, and even banking platforms.

If you have a bank account with online access, and you are redirected to a form that’s vulnerable, an attacker can grab your session cookie, make withdrawals without 2FA and even spend money anonymously.

These attacks have become extremely advanced, and also extremely easy to execute, so guarding against it is paramount. And PHP makes managing XSS easy and effective.
