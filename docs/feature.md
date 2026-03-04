// TUYISHIME Cynthia
// Reg No: 25/30963

# Phase 1 — Planning Documentation
## Musanze Potato Market — Order Management System

---

## 1. Problem Statement

Potato farmers and agricultural aggregators in Musanze District, Rwanda, 
currently manage their transactions manually using paper records. 
This leads to frequent errors in order totals, lost receipts, and 
difficulty tracking supplier history.

The Musanze Potato Market Order Management System is a web-based solution 
that allows aggregators to register farmers, create orders, auto-compute 
totals, generate printable receipts, and monitor daily sales through a 
dashboard — replacing paper-based processes with a fast, reliable digital system.

---

## 2. Stakeholders

| Stakeholder | Role |
|---|---|
| Aggregator / Agent | Creates orders, registers suppliers, prints receipts |
| Admin | Manages the system, views all data |
| Farmers / Suppliers | Registered in the system, receive receipts |
| Market Manager | Monitors daily totals via dashboard |

---

## 3. User Stories

| # | As a... | I want to... | So that... |
|---|---|---|---|
| 1 | Aggregator | Log in securely | Only authorized users access the system |
| 2 | Aggregator | Register a new farmer | I can link orders to the correct supplier |
| 3 | Aggregator | Create an order with multiple items | I can record exactly what was purchased |
| 4 | Aggregator | See the total auto-computed | I don't make manual calculation errors |
| 5 | Aggregator | Generate a printable receipt | The farmer has proof of the transaction |
| 6 | Admin | View the dashboard | I can monitor today's orders and revenue |
| 7 | Admin | See all recent orders | I can track market activity |
| 8 | Aggregator | Remove a supplier | I can keep the supplier list clean |

---

## 4. Acceptance Criteria

- Login must reject wrong credentials and show an error message
- Orders cannot be saved without a supplier, location, and at least one item
- Total must update in real time as quantity or price changes
- Receipt must show all order details and be printable
- Dashboard must show today's order count and revenue

---

## 5. Scope

### In Scope
- Admin/aggregator login and logout
- Supplier registration and deletion
- Order creation with multiple items
- Auto-computed order totals
- Printable receipt generation
- Dashboard with basic stats

### Out of Scope
- Mobile app version
- SMS notifications to farmers
- Payment processing / M-Pesa integration
- Multi-language support
- Inventory management

---

## 6. Non-Functional Requirements (NFRs)

| Requirement | Detail |
|---|---|
| Security | Passwords hashed with PHP password_hash(). Prepared statements prevent SQL injection |
| Usability | Clean UI, responsive on mobile and desktop |
| Performance | Pages load within 2 seconds on localhost |
| Reliability | All data stored in MySQL with foreign key constraints |
| Maintainability | MVC structure separates concerns for easy updates |

---

## 7. Page Map / Navigation Flow
```
[Login Page]
     │
     ▼ (on success)
[Dashboard] ──────────────────────────────────┐
     │                                         │
     ├──► [Suppliers Page]                     │
     │         ├── Register Supplier           │
     │         └── Delete Supplier             │
     │                                         │
     ├──► [Orders Page]                        │
     │         └── Create Order ──► [Receipt]  │
     │                                         │
     └──► [Logout] ──► [Login Page] ◄──────────┘
```

---

*Document prepared by: Group 4*  
