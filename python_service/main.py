from fastapi import FastAPI, HTTPException
from sentence_transformers import SentenceTransformer
import torch

app = FastAPI()

print("Sedang memuat model AI ke RAM...")
try:
    model = SentenceTransformer('all-MiniLM-L6-v2', device='cpu')
    print("Model AI berhasil dimuat!")
except Exception as e:
    print(f"Gagal memuat model: {e}")

@app.get("/")
def home():
    return {
        "status": "LogicSense Lokal Aktif",
        "device": "CPU",
        "info": "Menjalankan AI langsung di laptop Khaerul Fajri"
    }

@app.get("/tes_ai")
def tes_ai():
    try:

        sentences = ["Mahasiswa Informatika UNBHARA lagi ngetes kodingan."]
        
        embeddings = model.encode(sentences)
        
        return {
            "status": "SUKSES LOKAL",
            "vektor_sample": embeddings[0][:5].tolist(),
            "keterangan": "Angka ini dihitung langsung oleh CPU laptop lo, bukan Cloud!"
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.post("/get_similarity")
async def get_similarity(data: dict):

    t1 = data.get("teks1")
    t2 = data.get("teks2")
    
    emb1 = model.encode(t1)
    emb2 = model.encode(t2)
    
    cos = torch.nn.CosineSimilarity(dim=0)
    sim = cos(torch.tensor(emb1), torch.tensor(emb2))
    
    return {"persentase": float(sim) * 100}