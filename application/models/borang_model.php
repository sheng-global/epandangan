<?php
Class Borang_model extends Model {
	
	public function get($table)
	{
		try{
			$stm = "SELECT * FROM borang_".$table;
			$result = $this->pdo->fetchAll($stm);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getByID($table, $borang_id)
	{
		try{
			$stm = "SELECT * FROM view_borang_".$table." WHERE borang_id = :borang_id";
			$bind = array('borang_id' => $borang_id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getByUserID($table, $user_id)
	{
		try{
			$stm = "SELECT * FROM view_borang_".$table." WHERE user_id = :user_id";
			$bind = array('user_id' => $user_id);
			$result = $this->pdo->fetchAll($stm, $bind);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function addPTKL($data)
	{
		try{
			$stm = "INSERT INTO borang_ptkl (peta_indeks, no_lot, muka_surat, pandangan_awam, cadangan, user_id, tarikh_terima, hadir, kategori, nama_organisasi, jumlah_nama) VALUES (:peta_indeks, :no_lot, :muka_surat, :pandangan_awam, :cadangan, :user_id, :tarikh_terima, :hadir, :kategori, :nama_organisasi, :jumlah_nama)";
			$bind = array(
				'peta_indeks' => $data['peta_indeks'],
				'no_lot' => $data['no_lot'],
				'muka_surat' => $data['muka_surat'],
				'pandangan_awam' => $data['pandangan_awam'],
				'cadangan' => $data['cadangan'],
				'user_id' => $data['user_id'],
				'tarikh_terima' => $data['tarikh_terima'],
				'hadir' => $data['hadir'],
				'kategori' => $data['kategori'],
				'nama_organisasi' => $data['nama_organisasi'],
				'jumlah_nama' => $data['jumlah_nama']
			);
			
			$this->pdo->fetchAffected($stm, $bind);
			return $this->pdo->lastInsertId();
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function addBorangPSKL($data)
	{
		try{
			$stm = "INSERT INTO pskl_borang (user_id, komen_bentuk_kandungan, komen_lain_lain, tarikh_terima, hadir, kategori, nama_organisasi, jumlah_nama) VALUES (:user_id, :komen_bentuk_kandungan, :komen_lain_lain, :tarikh_terima, :hadir, :kategori, :nama_organisasi, :jumlah_nama)";
			$bind = array(
				'komen_bentuk_kandungan' => $data['komen_bentuk_kandungan'],
				'komen_lain_lain' => $data['komen_lain_lain'],
				'user_id' => $data['user_id'],
				'tarikh_terima' => $data['tarikh_terima'],
				'hadir' => $data['hadir'],
				'kategori' => $data['kategori'],
				'nama_organisasi' => $data['nama_organisasi'],
				'jumlah_nama' => $data['jumlah_nama']
			);
			
			$this->pdo->fetchAffected($stm, $bind);
			return $this->pdo->lastInsertId();
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function addBorangMatlamat($data)
	{
		try{
			$stm = "INSERT INTO pskl_borang_matlamat (borang_id, matlamat_id, halatuju_id, tindakan_id, cadangan, justifikasi, last_update) VALUES (:borang_id, :matlamat_id, :halatuju_id, :tindakan_id, :cadangan, :justifikasi, :last_update)";
			$bind = array(
				'borang_id' => $data['borang_id'],
				'matlamat_id' => $data['matlamat_id'],
				'halatuju_id' => $data['halatuju_id'],
				'tindakan_id' => $data['tindakan_id'],
				'cadangan' => $data['cadangan'],
				'justifikasi' => $data['justifikasi'],
				'last_update' => $data['last_update']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function updatePTKL($data)
	{
		try{
			$stm = "UPDATE borang_ptkl SET peta_indeks = ".$data['peta_indeks'].", no_lot = ".$data['no_lot'].", muka_surat = ".$data['muka_surat'].", pandangan_awam = ".$data['pandangan_awam'].", cadangan = ".$data['cadangan'].", user_id = ".$data['user_id'].", pegawai_id = ".$data['pegawai_id'].", hadir = ".$data['hadir']." WHERE id = :id";
			$bind = array(
				'peta_indeks' => $data['peta_indeks'],
				'no_lot' => $data['no_lot'],
				'muka_surat' => $data['muka_surat'],
				'pandangan_awam' => $data['pandangan_awam'],
				'cadangan' => $data['cadangan'],
				'user_id' => $data['user_id'],
				'pegawai_id' => $data['pegawai_id'],
				'hadir' => $data['hadir'],
				'id' => $data['id'],
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function delete($data)
	{
		try{
			$stm = "DELETE FROM borang_".$data['table']." WHERE id = :id LIMIT 1";
			$bind = array(
				'id' => $data['id']
			);
			
			return $this->pdo->fetchAffected($stm, $bind);
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function getDropdown($table)
	{
		try{
			$stm = "SELECT * FROM ".$table;
			$result = $this->pdo->fetchAll($stm);
			return $result;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}