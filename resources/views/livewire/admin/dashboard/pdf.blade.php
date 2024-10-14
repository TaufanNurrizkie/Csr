<div class="container" style="max-width: 1200px; margin: 0 auto; margin-top: 1rem;">
    <div style="background-color: white; padding: 1rem; border-radius: 0.5rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
      <h2 style="font-size: 2rem; font-weight: bold; margin: 1rem 0; text-align: left;">Data Statistik</h2>
      <!-- Data Statistik -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; margin-bottom: 1rem; text-align: center;">
        <div style="background-color: #F95016; color: white; padding: 1rem; border-radius: 0.5rem;">
          <div style="display: flex; align-items: center; font-size: 1rem; justify-content: flex-start;">
            <!-- Tempat Icon -->
            <span style="margin-right: 0.5rem;">
              <!-- SVG Icon Here -->
            </span>
            Total Proyek CSR
          </div>
          <div style="font-size: 1.25rem; width: 100%; margin-top: 1.25rem; text-align: left; background-color: rgba(255, 255, 255, 0.2); color: white; font-weight: bold; border: 2px solid white; padding: 0.5rem; display: inline-block; border-radius: 0.375rem;">
            {{ $jumlahCSR }}
          </div>
        </div>

        <div style="background-color: #7A5AF8; color: white; padding: 1rem; border-radius: 0.5rem;">
          <div style="display: flex; align-items: center; font-size: 1rem; justify-content: flex-start;">
            <span style="margin-right: 0.5rem;">
              <!-- SVG Icon Here -->
            </span>
            Proyek Terealisasi
          </div>
          <div style="font-size: 1.25rem; width: 100%; margin-top: 1.25rem; text-align: left; background-color: rgba(255, 255, 255, 0.2); color: white; font-weight: bold; border: 2px solid white; padding: 0.5rem; display: inline-block; border-radius: 0.375rem;">
            {{ $jumlahApproved }}
          </div>
        </div>

        <div style="background-color: #2C5586; color: white; padding: 1rem; border-radius: 0.75rem;">
          <div style="display: flex; align-items: center; font-size: 1rem; justify-content: flex-start;">
            <span style="margin-right: 0.5rem;">
              <!-- SVG Icon Here -->
            </span>
            Mitra Bergabung
          </div>
          <div style="font-size: 1.25rem; width: 100%; margin-top: 1.25rem; text-align: left; background-color: rgba(255, 255, 255, 0.2); color: white; font-weight: bold; border: 2px solid white; padding: 0.5rem; display: inline-block; border-radius: 0.375rem;">
            {{ $jumlahMitra }}
          </div>
        </div>

        <div style="background-color: #1D9C53; color: white; padding: 1rem; border-radius: 0.5rem;">
          <div style="display: flex; align-items: center; font-size: 1rem; justify-content: flex-start;">
            <span style="margin-right: 0.5rem;">
              <!-- SVG Icon Here -->
            </span>
            Total Dana CSR
          </div>
          <div style="font-size: 1.25rem; width: 100%; margin-top: 1.25rem; text-align: left; background-color: rgba(255, 255, 255, 0.2); color: white; font-weight: bold; border: 2px solid white; padding: 0.5rem; display: inline-block; border-radius: 0.375rem;">
            {{ 'Rp. ' . number_format($totalDanaCsr, 0, ',', '.') }}
          </div>
        </div>
      </div>
    </div>
    <h2 style="font-size: 2rem; font-weight: bold; margin-left: 2rem; margin-bottom: 2rem; text-align: left; margin-top: 2rem;">Realisasi Proyek CSR</h2>
</div>

<!-- Realisasi Proyek CSR -->
<div style="background-color: #f9fafb; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
    <!-- Charts Section -->
    @foreach ([$pieChart, $barChart] as $chart)
    <div style="background-color: white; padding: 1.25rem; border-radius: 0.5rem; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
      <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
        <div style="width: 100%; height: 100%;">
          {!! $chart->container() !!}
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{ $pieChart->script() }}
{{ $barChart->script() }}

