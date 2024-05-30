SELECT
  v.vluchtnummer,
  v.max_aantal,
  v.max_gewicht_pp,
  v.max_totaalgewicht,
  v.vertrektijd,
  v.gatecode,
  m.maatschappij,
  m.maatschappijcode,
  l.luchthaven,
  l.luchthavencode
FROM Vlucht v
JOIN Maatschappij m ON v.maatschappijcode = m.maatschappijcode
JOIN Luchthaven l ON v.bestemming = l.luchthavencode
WHERE v.vluchtnummer = ['vluchtnummer'];