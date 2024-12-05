# Food Donation Website Database Schema

This document outlines the database schema used for the food donation website.

## Tables

### **User Table**
- **user_id**: Primary key to uniquely identify each user.  
- **username**: The username chosen by the user.  
- **email**: The user's email address.  
- **password**: The user's password, stored securely (hashed).  
- **phone_number**: The user's contact phone number.  

---

### **Orphanage Table**
- **orphanage_id**: Primary key to uniquely identify each orphanage.  
- **name**: The name of the orphanage.  
- **address**: The location address of the orphanage.  
- **contact_number**: The contact phone number of the orphanage.  

---

### **FoodItem Table**
- **food_item_id**: Primary key to uniquely identify each food item.  
- **name**: The name of the food item.  
- **description**: A brief description of the food item.  
- **quantity**: The available quantity of the food item.  

---

### **DeliveryOrder Table**
- **order_id**: Primary key to uniquely identify each delivery order.  
- **user_id**: Foreign key referencing the **user_id** in the **User** table.  
- **orphanage_id**: Foreign key referencing the **orphanage_id** in the **Orphanage** table.  
- **order_date**: The date the order was placed.  

---

### **OrderItem Table**
- **order_id**: Foreign key referencing the **order_id** in the **DeliveryOrder** table.  
- **food_item_id**: Foreign key referencing the **food_item_id** in the **FoodItem** table.  
- **quantity**: The quantity of the specific food item included in the order.  

---

This schema is designed to organize and manage the data required for users, orphanages, food items, and delivery orders effectively.
