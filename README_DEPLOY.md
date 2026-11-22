# 🎂 SweetDream Cakes BD — লাইভ ডিপ্লয়মেন্ট গাইড (cPanel & XAMPP)

## ১. সুপার-ফাস্ট আর্কিটেকচার
- **Backend:** PHP 8+ (PHP 7.4+ Compatible) + SQLite3 (WAL Mode + Memory Cache — জিরো MySQL কনফিগারেশন, ইনস্ট্যান্ট লাইভ!)
- **Python Turbo Engine:** `python_engine/speed_optimizer.py` (JSON ক্যাশ প্রি-ওয়ার্ম ও Facebook Shop Catalog CSV জেনারেটর)
- **Frontend:** Bootstrap 5.3 + Font Awesome 6 + Hind Siliguri + PWA (`manifest.json` + `sw.js`)

## ২. cPanel (`public_html`) বা XAMPP-এ লাইভ করার নিয়ম
1. `sweetdream-cakes-ecommerce-complete.zip` ফাইলটি আপনার cPanel-এর `public_html` (অথবা XAMPP-এর `htdocs/sweetdream-cakes/`) ফোল্ডারে Extract করুন।
2. `storage/` এবং `assets/images/uploads/` ফোল্ডারের পারমিশন `775` নিশ্চিত করুন।
3. সরাসরি ব্রাউজারে আপনার ডোমেইন ভিজিট করুন — ওয়েবসাইট, ৬৪টি কেক প্রোডাক্ট, ১৮টি ডেমো অর্ডার ও ডাটাবেজ সাথে সাথেই লাইভ হয়ে যাবে!

## ৩. ডেমো লগইন তথ্য
- **মাস্টার অ্যাডমিন প্যানেল (`/admin/index.php`):**
  - Email: `admin@sweetdreamcakes.com`
  - Password: `Admin@123`
- **কাস্টমার ড্যাশবোর্ড (`/customer/dashboard.php`):**
  - Email: `customer@sweetdreamcakes.com`
  - Password: `Customer@123`

## ৪. মোবাইল ও ইমেইল অর্ডার নোটিফিকেশন
- **ডিজিটাল HTML ইমেইল:** নতুন অর্ডার এলেই অ্যাডমিন ও কাস্টমারের ইমেইলে ডিজিটাল ইনভয়েস মেইল চলে যাবে এবং `storage/emails/` ফোল্ডারে HTML প্রিভিউ সেভ থাকবে।
- **মোবাইল পুশ নোটিফিকেশন:** হেডার বা অ্যাডমিন প্যানেলের 🔔 বাটনে ক্লিক করে ব্রাউজার/মোবাইল নোটিফিকেশন Allow করুন। এছাড়া **Admin -> ওয়েবসাইট তথ্য আপডেট**-এ Telegram Bot Token ও Chat ID দিলে প্রতি অর্ডারে সাথে সাথে মোবাইলে Telegram অ্যালার্ট যাবে।

## ৫. ফেসবুক পেজ সেটআপ কিট
- `facebook-page-setup/` ফোল্ডারে লোগো (`logo-square-1024.png`, `logo.svg`), কভার ব্যানার (`fb-cover-banner-1640x624.png`) এবং সম্পূর্ণ বাংলা SEO গাইড (`FB_PAGE_SETUP_GUIDE.html`) দেওয়া আছে।

## ৬. GitHub-এ প্রজেক্ট পুশ (Push) করার নিয়ম
প্রজেক্টটি GitHub Repository-তে সংরক্ষণ বা আপলোড করতে নিচের ধাপগুলো অনুসরণ করুন (কম্পিউটারে [Git](https://git-scm.com/) ইনস্টল থাকতে হবে):

1. **GitHub-এ নতুন Repository তৈরি করুন:**
   - [GitHub](https://github.com/)-এ লগইন করে **New repository** বাটনে ক্লিক করুন (যেমন: `sweetdream-cakes`)।
   - `README`, `.gitignore` বা `License` যোগ না করে **Create repository** করুন এবং প্রদর্শিত Repository URL-টি (যেমন: `https://github.com/your-username/sweetdream-cakes.git`) কপি করুন।

2. **প্রজেক্ট ফোল্ডারে Git সেটআপ ও প্রথম Push:**
   `sweetdream-cakes` ফোল্ডারের ভেতর **Terminal / Git Bash** ওপেন করে নিচের কমান্ডগুলো একের পর এক চালান:
   ```bash
   # ১. Git ইনিশিয়ালাইজ করুন
   git init

   # ২. (প্রথমবার হলে) আপনার Git নাম ও ইমেইল সেট করুন
   git config user.name "Your Name"
   git config user.email "your-email@example.com"

   # ৩. সব ফাইল যুক্ত করে কমিট করুন
   git add .
   git commit -m "Initial commit: SweetDream Cakes BD"

   # ৪. main ব্রাঞ্চ সেট করে GitHub রিমোট যুক্ত করুন
   git branch -M main
   git remote add origin https://github.com/your-username/sweetdream-cakes.git

   # ৫. GitHub-এ পুশ করুন
   git push -u origin main
   ```
   *(বিঃদ্রঃ পুশ করার সময় পাসওয়ার্ড চাইলে আপনার GitHub অ্যাকাউন্টের পাসওয়ার্ডের বদলে **Personal Access Token (Classic)** ব্যবহার করুন অথবা ব্রাউজার লগইনের মাধ্যমে অথেনটিকেশন সম্পন্ন করুন।)*

3. **পরবর্তীতে কোড আপডেট করলে পুনরায় Push করার নিয়ম:**
   ```bash
   git add .
   git commit -m "Update website features"
   git push
   ```

4. **`.gitignore` নোট:** প্রজেক্টের রুটে একটি `.gitignore` ফাইল যুক্ত করা হয়েছে, যাতে SQLite-এর টেম্পোরারি ফাইল (`*.sqlite-wal`, `*.sqlite-shm`), ইমেইল লগ (`storage/emails/`) এবং সিস্টেম ক্যাশ ফাইল অযথা GitHub-এ আপলোড না হয়। *(নোট: GitHub Pages শুধু স্ট্যাটিক HTML/CSS/JS সাপোর্ট করে, PHP ও SQLite চালানোর জন্য cPanel, VPS বা PHP-সাপোর্টেড হোস্টিং ব্যবহার করতে হবে।)*
