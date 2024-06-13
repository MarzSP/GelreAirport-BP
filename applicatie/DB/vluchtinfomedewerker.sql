SELECT
  v.vluchtnummer,
  v.max_aantal,
  v.max_gewicht_pp,
  v.max_totaalgewicht,
  v.vertrektijd,
  v.gatecode,
  m.naam,
  m.maatschappijcode,
  l.naam AS Lnaam,
  l.luchthavencode
FROM Vlucht v
JOIN Maatschappij m ON v.maatschappijcode = m.maatschappijcode
JOIN Luchthaven l ON v.bestemming = l.luchthavencode
