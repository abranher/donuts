<?php

namespace App\Http\Controllers\AuditLog;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuditLogController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('admin.audit-logs.index', [
      'audit_logs' => AuditLog::with('user')->paginate(5),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(AuditLog $auditLog)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(AuditLog $auditLog)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, AuditLog $auditLog)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(AuditLog $auditLog)
  {
    //
  }
}
