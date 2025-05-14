# 📅 MeetSync – Client Meeting & Follow-Up Management Tool

MeetSync is a modern web-based Laravel application designed to help teams manage client interactions, schedule meetings, and organize follow-up tasks — all in one place.

---

## 🚀 Features

- ✅ Client Management: Create, view, update, and delete client records with detailed info.
- 📆 Meeting Scheduler: Plan meetings with clients, add notes, track status (Upcoming, Completed, Cancelled), and attach documents.
- ⏱️ Follow-Up Tasks: Assign follow-up tasks after meetings with due dates and links to specific clients and meetings.
- 📊 Dashboard: Overview of upcoming meetings, follow-up tasks, and client statistics.
- 🗓️ Calendar View: FullCalendar integration to visualize scheduled meetings.
- 📱 Responsive UI: Clean layout using Tailwind CSS and Bootstrap Icons.

---

## 🧱 Built With

- Laravel 10+
- Blade Templating Engine
- Tailwind CSS & Bootstrap Icons
- FullCalendar.js
- MySQL (or any Laravel-supported DB)

---

## ⚙️ Installation

1. Clone the repository
   git clone https://github.com/your-username/meetsync.git
   cd meetsync

2. Install dependencies
   composer install
   npm install && npm run dev

3. Environment Setup
   cp .env.example .env
   php artisan key:generate

4. Database Setup
   - Create a database in MySQL (e.g., meetsync)
   - Update .env:
     DB_DATABASE=meetsync
     DB_USERNAME=your_username
     DB_PASSWORD=your_password

5. Migrate the database
   php artisan migrate

6. Run the application
   php artisan serve

---

## 🔐 Authentication

MeetSync uses Laravel Breeze or Jetstream (depending on setup) for user authentication and email verification. Only logged-in users can access the dashboard and features.

---

## 📂 Folder Structure Highlights

- app/Http/Controllers/: Logic for clients, meetings, follow-ups, and dashboard
- resources/views/: Blade templates for all UI components
- routes/web.php: Routes for web pages and controllers

---

## ✅ Future Enhancements

- [ ] Email notifications for upcoming meetings or due tasks
- [ ] Export to Excel/PDF
- [ ] Role-based access (Admin/User)
- [ ] REST API for mobile apps

---

## 📄 License

This project is open-source under the MIT License.

---

## 🙌 Contributing

Pull requests are welcome! For large changes, open an issue to discuss your idea first.

---

## 🧠 Credits

Built with ❤️ by Hossam Ali
