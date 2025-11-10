<?php
require '../includes/config.php'; session_start(); if(!isset($_SESSION['subadmin_id'])) { header('Location: /admin/index.php'); exit; }
?><!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Sub Admin Dashboard</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'><link rel='stylesheet' href='/assets/css/style.css'></head><body><div class='container py-4'><h3>Sub Admin Area</h3><p>Upload products and manage stock (phase 2).</p></div></body></html>
