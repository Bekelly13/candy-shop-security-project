# Candy Store Vulnerable Web Application

This project demonstrates common web application security vulnerabilities using a simple candy store website. The application intentionally contains insecure code to showcase how attackers can exploit weaknesses such as Cross-Site Scripting (XSS), SQL Injection, and insecure file access.

Each vulnerability is demonstrated with **before and after code examples**, showing both the insecure implementation and the corrected secure version. The goal of this project is to illustrate how these attacks work and how developers can properly defend against them.

---

## Project Overview

The web application simulates a small candy store website with the following features:

* Product listing page
* Staff login portal
* Customer review submission
* Developer file viewer

Several intentional vulnerabilities are present in the original implementation to demonstrate how attackers could compromise a web application.

---

## Vulnerabilities Demonstrated

### Cross-Site Scripting (XSS)

The review submission form does not properly sanitize user input, allowing attackers to inject malicious scripts that execute in a user's browser.

Example attack:

```
<script>alert("XSS Attack")</script>
```

---

### SQL Injection

The staff login page contains an SQL query that directly inserts user input into the query string without validation.

Example injection:

```
' OR '1'='1
```

This allows an attacker to bypass authentication and gain unauthorized access to the admin area.

---

### Insecure File Access (Directory Traversal)

The developer file viewer allows users to request files directly from the server without proper path validation. This can allow attackers to access sensitive files on the system.

Example attack:

```
view.php?file=../../etc/passwd
```

---

## Remediation Techniques

This project also demonstrates how these vulnerabilities can be mitigated using secure development practices such as:

* Input validation and sanitization
* Parameterized SQL queries
* Proper file access controls
* Secure coding practices

Each vulnerability includes **before and after code examples** showing how the insecure implementation was corrected.

---

## Vulnerability Mapping

| Vulnerability              | Vulnerable File           | Secure Version              |
| -------------------------- | ------------------------- | --------------------------- |
| Cross-Site Scripting (XSS) | vulnerable-code/index.php | fixed-code/index_secure.php |
| SQL Injection              | vulnerable-code/login.php | fixed-code/login_secure.php |
| Directory Traversal        | vulnerable-code/view.php  | fixed-code/view_secure.php  |

---

## Skills Demonstrated

* Web application vulnerability analysis
* Cross-Site Scripting (XSS) exploitation and mitigation
* SQL Injection exploitation and mitigation
* Directory traversal vulnerability analysis
* Secure PHP development practices
* Input validation and output sanitization
* Secure database queries using prepared statements

---

## Demonstration Video

A walkthrough of the vulnerable application, exploitation of each vulnerability, and the implemented security fixes.

https://youtu.be/7iFv4GMW7yg

---

## Repository Structure

```
candy-shop-security-project
│
├── vulnerable-code
│   ├── index.php
│   ├── login.php
│   └── view.php
│
├── fixed-code
│   ├── index_secure.php
│   ├── login_secure.php
│   └── view_secure.php
│
├── screenshots
│
└── README.md
```

---

## Disclaimer

This project contains intentionally vulnerable code for **educational and cybersecurity training purposes only**. It should never be deployed in a production environment.
