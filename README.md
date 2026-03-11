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

### Insecure File Access (Developer File Viewer)

The developer file viewer allows users to request files directly from the server without proper path validation. This can allow attackers to access sensitive files on the system.

---

## Remediation Techniques

This project also demonstrates how these vulnerabilities can be mitigated using secure development practices such as:

* Input validation and sanitization
* Parameterized SQL queries
* Proper file access controls
* Secure coding practices

Each vulnerability includes **before and after code examples** showing how the insecure implementation was corrected.

---

## Repository Structure

```
candy-store-vulnerable-webapp
│
├── README.md
├── vulnerable-code
├── fixed-code
└── screenshots
```

---

## Disclaimer

This project contains intentionally vulnerable code for **educational and cybersecurity training purposes only**. It should never be deployed in a production environment.
