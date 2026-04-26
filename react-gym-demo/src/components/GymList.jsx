import React, { useState } from 'react';
import { mockGyms } from '../data/mockData';

const GymList = () => {
  const [filterCity, setFilterCity] = useState('');

  const filteredGyms = filterCity 
    ? mockGyms.filter(gym => gym.city === filterCity)
    : mockGyms;

  return (
    <section className="py-5" id="gym-locations">
      <div className="container">
        <div className="row mb-5 text-center">
          <div className="col-12">
            <h2 className="section-title">Pilih Gym <span>Terbaikmu</span></h2>
            <p className="section-subtitle">Berbagai pilihan gym dengan fasilitas terlengkap di sekitarmu</p>
          </div>
        </div>

        <div className="row">
          {/* Sidebar Filter */}
          <div className="col-lg-3 col-md-4 mb-4">
            <div className="filter-card position-sticky" style={{ top: '100px' }}>
              <h4 className="text-white mb-3">Filter Pencarian</h4>
              <form onSubmit={(e) => e.preventDefault()}>
                <div className="mb-4 text-left">
                  <label className="form-label text-white">Kota</label>
                  <select 
                    className="form-select w-100 p-2 rounded" 
                    value={filterCity}
                    onChange={(e) => setFilterCity(e.target.value)}
                    style={{ backgroundColor: '#2a2a2a', color: '#fff', border: '1px solid #444' }}
                  >
                    <option value="">Semua Kota</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="bandung">Bandung</option>
                    <option value="surabaya">Surabaya</option>
                    <option value="yogyakarta">Yogyakarta</option>
                  </select>
                </div>
                <button type="button" className="btn-solid-neon w-100">Terapkan Filter</button>
              </form>
            </div>
          </div>

          {/* Gym Grid */}
          <div className="col-lg-9 col-md-8">
            <div className="row g-4">
              {filteredGyms.length > 0 ? (
                filteredGyms.map(gym => (
                  <div className="col-xl-4 col-lg-6 col-md-12 mb-4" key={gym.id}>
                    <div className="glass-card">
                      <div className="gym-img-container">
                        <img src={gym.image} alt={gym.name} />
                        <span className="gym-badge">Tersedia</span>
                      </div>
                      <div className="gym-info text-left">
                        <h3 className="gym-title">{gym.name}</h3>
                        <div className="gym-address text-muted">
                          <i className="fas fa-map-marker-alt"></i>
                          <span>{gym.address.length > 40 ? gym.address.substring(0, 40) + '...' : gym.address}</span>
                        </div>
                        <div className="d-flex justify-content-between align-items-center mt-4">
                          <div className="rating">
                            {[1, 2, 3, 4, 5].map(star => (
                              <i key={star} className={`fas fa-star ${star <= gym.rating ? 'text-warning' : 'text-muted'} small mr-1`}></i>
                            ))}
                          </div>
                          <a href="#" className="btn-outline-neon">Lihat Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
                ))
              ) : (
                <div className="col-12">
                  <div className="glass-card p-5 text-center w-100">
                    <i className="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 className="text-white">Tidak ada gym ditemukan</h4>
                    <p className="text-muted">Cobalah mengubah filter pencarian Anda.</p>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default GymList;
