# Systems Analysis & Design Specification
**Project:** NBA Stats Explorer  
**Module:** Player Watchlists & Scouting Notes CRUD  
**Points:** 10 PTS

---

## Deliverable 1: Use Case Model

```
+-----------------------------------------------------------------------------+
|                         SYSTEM: NBA STATS EXPLORER                          |
|                                                                             |
|                                                                             |
|                      +-----------------------------------+                  |
|                      |   UC01: Manage Player Watchlists  |                  |
|                      |  (Create, Read, Update, Delete)   |                  |
|                      +-----------------------------------+                  |
|                                        ^                                    |
|   +-----------------+                  |                                    |
|   |                 |                  |                                    |
|   | Registered User |------------------+                                    |
|   |     (Actor)     |                  |                                    |
|   +-----------------+                  |                                    |
|                                        v                                    |
|                      +-----------------------------------+                  |
|                      |    UC02: Manage Scouting Notes    |                  |
|                      |  (Create, Read, Update, Delete)   |                  |
|                      +-----------------------------------+                  |
|                                                                             |
|                                                                             |
+-----------------------------------------------------------------------------+
```

---

## Deliverable 2: Use Case Documents

### Use Case Document 1: UC01 - Manage Player Watchlists

| Use Case Field | Description / Value |
| :--- | :--- |
| **Use Case ID** | **UC01** |
| **Use Case Name** | Manage Player Watchlists |
| **Primary Actor** | Registered User |
| **Goal** | Create, view, update, and remove personalized collections of NBA players to track performance statistics. |
| **Trigger** | User navigates to the "My Watchlists" section from the application navigation bar. |
| **Preconditions** | User is authenticated (signed in) and the watchlists dashboard is accessible (`watchlists.php`). |
| **Success Outcome** | System validates input, persists/updates the watchlist selection, displays success status, and renders list details. |
| **Failure Outcome** | System keeps the form visible, highlights specific validation errors, preserves valid field inputs, and leaves NBA entity data untouched. |

#### Main Success Scenario (Normal Flow)
1. User clicks **"+ Create New Watchlist"** (`watchlist-create.php`) or selects **"Edit"** on an existing watchlist (`watchlist-edit.php`).
2. System displays the Watchlist Form with fields: *Watchlist Name* (text), *Description* (textarea), and *Player Selection* (checkboxes).
3. User enters a unique Watchlist Name, an optional description, selects at least one player, and submits the form.
4. System validates server-side: verifies Name is not empty, checks length constraints (max 100 chars), and ensures at least one valid player is checked.
5. System accepts the intake/update, displays a confirmation message, and redirects the user to the Watchlist Dashboard (`watchlists.php`).
6. User can view saved lists or click the inline **"Delete"** button to remove a list after confirming the prompt.

#### Alternative & Exception Flows (Failure Paths)
* **Alt Flow 3a: Missing Watchlist Name**
  * System flags `Name` field as required, retains checked players, and displays `"Watchlist name is required."`.
* **Alt Flow 3b: No Players Selected**
  * System detects zero checked players and displays `"At least one player must be selected."`.
* **Alt Flow 6a: Deletion Cancellation**
  * User cancels the inline deletion confirmation modal; system leaves the watchlist intact.

---

### Use Case Document 2: UC02 - Manage Scouting Notes

| Use Case Field | Description / Value |
| :--- | :--- |
| **Use Case ID** | **UC02** |
| **Use Case Name** | Manage Qualitative Scouting & Analysis Notes |
| **Primary Actor** | Registered User |
| **Goal** | Create, view, update, and remove detailed qualitative scouting notes, category tags, and impact ratings for individual players. |
| **Trigger** | User clicks "Scouting Notes" in the navigation header or selects "Add Note" on a player card. |
| **Preconditions** | User is signed in and the Scouting Notes dashboard is accessible (`scouting-notes.php`). |
| **Success Outcome** | System validates note content and metadata, saves/updates the record, and displays the updated notes board. |
| **Failure Outcome** | System prevents submission, highlights failed field rules (e.g., character overflow), and keeps input text intact. |

#### Main Success Scenario (Normal Flow)
1. User selects **"+ Add New Scouting Note"** (`scouting-note-create.php`) or clicks **"Edit Note"** (`scouting-note-edit.php`).
2. System loads the form containing: *Note Title*, *Target Player/Team*, *Category Tag* (e.g., Breakout Candidate, Trade Target), *Impact Rating* (1–5 Stars), and *Analysis Content* (textarea).
3. User enters a title, chooses a target player, selects a rating and tag, enters detailed notes, and clicks **"Save Note"**.
4. System validates server-side: ensures Title and Player are present, Rating is within range (1-5), and Content does not exceed 1,000 characters.
5. System confirms entry, redirects to `scouting-notes.php`, and displays the note card on the dashboard.
6. User can browse existing notes or trigger an inline **"Delete"** button to remove an entry.

#### Alternative & Exception Flows (Failure Paths)
* **Alt Flow 3a: Missing Note Title or Target Player**
  * System alerts `"Title and Target Player are required fields."`.
* **Alt Flow 3b: Text Content Exceeds Character Limit (> 1000 characters)**
  * System rejects submission and displays `"Analysis content cannot exceed 1000 characters."`.

---

## Deliverable 3: Use Case Activity Diagrams

### Activity Diagram 1: UC01 - Manage Player Watchlists

```
       USER / ACTOR SWIMLANE                         SYSTEM (PHP/SERVER) SWIMLANE
+------------------------------------+             +------------------------------------+
|                                    |             |                                    |
|   (Start: Open Watchlist Page)     |             |                                    |
|                 |                  |             |                                    |
|                 v                  |             |                                    |
|   [ Click Create / Edit Form ] ----+------------>| [ Render HTML Form & Player List ] |
|                                    |             |                 |                  |
|                                    |<------------+-----------------+                  |
|                 v                  |             |                                    |
|   [ Enter Title, Desc & Check ]    |             |                                    |
|   [ Players, Submit Form      ] ---+------------>| [ Execute PHP Server Validation ]  |
|                                    |             |                 |                  |
|                                    |             |                 v                  |
|                                    |             |      < Pass All Validation? >      |
|                                    |             |       /                  \         |
|                                    |             |     (No)                (Yes)      |
|                                    |             |     /                      \       |
|                                    |             |    v                        v      |
|   [ Review Correction Messages ]   |<------------+-- [ Form Errors Array ]  [ Persist ]
|                 |                  |             |   [ Preserve Field    ]  [ Record  ]
|                 +------------------+------------>|   [ Input Values      ]     |      |
|                 (Fix Errors)       |             |                             v      |
|                                    |             |<-------------------- [ Redirect to ]
|                 |                  |             |                      [ Dash + Msg  ]
|                 v                  |             |                             |      |
|   [ View Watchlist Dashboard ]     |             |                             |      |
|                 |                  |             |                             |      |
|                 v                  |             |                             |      |
|   < Perform Inline Delete? >       |             |                             |      |
|       /                 \          |             |                             |      |
|     (No)               (Yes)       |             |                             |      |
|      |                   |         |             |                             |      |
|      v                   v         |             |                             |      |
|   [ Keep List ]   [ Confirm &  ]   |             |                             |      |
|   [  Active   ]   [ Submit Del ] --+------------>| [ Delete Record & Refresh ] |      |
|        |                 |         |             |                 |                  |
|        v                 v         |             |                 v                  |
|    ( End )            ( End )      |             |             ( End )                |
|                                    |             |                                    |
+------------------------------------+             +------------------------------------+
```

---

### Activity Diagram 2: UC02 - Manage Scouting Notes

```
       USER / ACTOR SWIMLANE                         SYSTEM (PHP/SERVER) SWIMLANE
+------------------------------------+             +------------------------------------+
|                                    |             |                                    |
|   (Start: Open Scouting Notes)     |             |                                    |
|                 |                  |             |                                    |
|                 v                  |             |                                    |
|   [ Click Create Note Button ] ----+------------>| [ Render Scouting Form & Fields ]  |
|                                    |             |                 |                  |
|                                    |<------------+-----------------+                  |
|                 v                  |             |                                    |
|   [ Enter Title, Select Player, ]  |             |                                    |
|   [ Rating, Tag & Analysis Text ] -+------------>| [ Execute PHP Server Rules ]       |
|                                    |             |   - Required Fields Check          |
|                                    |             |   - Max Length <= 1000 chars       |
|                                    |             |                 |                  |
|                                    |             |                 v                  |
|                                    |             |      < Pass All Validation? >      |
|                                    |             |       /                  \         |
|                                    |             |     (No)                (Yes)      |
|                                    |             |     /                      \       |
|                                    |             |    v                        v      |
|   [ View Error Callouts ]          |<------------+-- [ Set $errors Key ]    [ Save Note ]
|                 |                  |             |   [ Retain Text Box ]       |      |
|                 +------------------+------------>|                             v      |
|                 (Revise Input)     |             |<-------------------- [ Redirect to ]
|                                    |             |                      [ Notes Board ]
|                 |                  |             |                             |      |
|                 v                  |             |                             |      |
|   [ View Notes Dashboard Card ]    |             |                             |      |
|                 |                  |             |                             |      |
|                 v                  |             |                             |      |
|   < Click Delete Button? >         |             |                             |      |
|       /                 \          |             |                             |      |
|     (No)               (Yes)       |             |                             |      |
|      |                   |         |             |                             |      |
|      v                   v         |             |                             |      |
|   [ Keep Note ]   [ Confirm Delete ]------------>| [ Purge Note Record ]       |      |
|        |                 |         |             |                 |                  |
|        v                 v         |             |                 v                  |
|    ( End )            ( End )      |             |             ( End )                |
|                                    |             |                                    |
+------------------------------------+             +------------------------------------+
```