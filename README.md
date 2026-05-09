# LogicSense - Intelligence Plagiarism Detection System 🧠🔥

**LogicSense** adalah sistem deteksi plagiarisme hybrid yang menggabungkan efisiensi **CodeIgniter 4** dengan kekuatan **Natural Language Processing (NLP)** melalui model **Transformer**. Proyek ini merupakan manifestasi dari konsep *Anomali*—membangun sistem yang mandiri, unik, dan presisi.

## 🚀 Teknologi yang Digunakan
*   **Web Core**: CodeIgniter 4 (PHP 8.x).
*   **AI Engine**: FastAPI (Python 3.9+) dengan model `all-MiniLM-L6-v2`.
*   **Cloud Database**: Supabase (PostgreSQL & Cloud Storage).
*   **NLP Method**: Sentence Embeddings & Cosine Similarity.
*   **PDF Engine**: Smalot PDFParser.

## 🛠️ Arsitektur Sistem
Sistem ini bekerja secara asinkronus antara dua layanan utama:
1.  **Frontend/Backend (CI4)**: Menangani manajemen user, upload file, dan ekstraksi teks PDF.
2.  **AI Microservice (FastAPI)**: Menghitung kemiripan makna antar dokumen secara semantik (bukan sekadar kata per kata).

## ⚙️ Cara Instalasi
1.  **Clone Repo**: `git clone https://github.com/khaerul-fj/turnitin.git`.
2.  **Web Setup**: Masuk ke folder `codeigniter`, jalankan `composer install`.
3.  **Python Setup**: Masuk ke folder `python_service`, jalankan `pip install -r requirements.txt`.
4.  **Environment**: Konfigurasi `.env` dengan kredensial Supabase lo.

---
*"Building a legacy through code. Because being normal is a mistake."* — **LogicSense**
