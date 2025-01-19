CREATE DATABASE ShoppingCart;
go
USE ShoppingCart;
GO

CREATE TABLE ttt_QUAN_TRI(			
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_TaiKhoan NVARCHAR(255) UNIQUE,
  ttt_MatKhau NVARCHAR(255),
  ttt_TrangThai TINYINT  
);
GO

CREATE TABLE ttt_LOAI_SAN_PHAM(
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_MaLoai VARCHAR(255) UNIQUE,
  ttt_TenLoai VARCHAR(255),
  ttt_TrangThai TINYINT  
);
GO

CREATE TABLE ttt_SAN_PHAM(
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_MaSanPham VARCHAR(255) UNIQUE,
  ttt_TenSanPham VARCHAR(255),
  ttt_HinhAnh VARCHAR(255),
  ttt_SoLuong INT,
  ttt_DonGia FLOAT,
  ttt_MaLoai INT REFERENCES ttt_LOAI_SAN_PHAM(ttt_ID),
  ttt_MoTa NVARCHAR(255),
  ttt_TrangThai TINYINT  
);
GO

CREATE TABLE ttt_KHACH_HANG(
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_MaKhachHang VARCHAR(255) UNIQUE,
  ttt_HoTenKhachHang VARCHAR(255),
  ttt_Email VARCHAR(255) UNIQUE,
  ttt_MatKhau VARCHAR(255),
  ttt_DienThoai VARCHAR(10) UNIQUE,
  ttt_DiaChi VARCHAR(255),
  ttt_NgayDangKy DATETIME,
  ttt_TrangThai TINYINT
);
GO

CREATE TABLE ttt_HOA_DON(
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_MaHoaDon VARCHAR(255) UNIQUE,
  ttt_MaKhachHang INT REFERENCES ttt_KHACH_HANG(ttt_ID),
  ttt_NgayHoaDon DATETIME,
  ttt_NgayNhan DATETIME,
  ttt_HoTenKhachHang VARCHAR(255),
  ttt_Email VARCHAR(255),
  ttt_DienThoai VARCHAR(10),
  ttt_DiaChi VARCHAR(255),
  ttt_TongTriGia FLOAT,
  ttt_TrangThai TINYINT
);
GO

CREATE TABLE ttt_CT_HOA_DON(
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_HoaDonID INT REFERENCES ttt_HOA_DON(ttt_ID),
  ttt_SanPhamID INT REFERENCES ttt_SAN_PHAM(ttt_ID),
  ttt_SoLuongMua INT,
  ttt_DonGiaMua FLOAT,
  ttt_ThanhTien FLOAT,
  ttt_TrangThai TINYINT
);
GO

CREATE TABLE ttt_TIN_TUC(
  ttt_ID INT PRIMARY KEY IDENTITY,
  ttt_MaTT NVARCHAR(255) UNIQUE,
  ttt_TieuDe NVARCHAR(255),
  ttt_MoTa NVARCHAR(255),
  ttt_NoiDung NVARCHAR(255),
  ttt_NgayDangTin DATE,
  ttt_NgayCapNhap DATE,
  ttt_HinhAnh NVARCHAR(255),
  ttt_TrangThai TINYINT
);
GO
