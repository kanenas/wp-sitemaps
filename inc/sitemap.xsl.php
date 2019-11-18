<?php
/**
 * Styling of rendered sitemap data.
 * Created a s php file so that that escaping and i18n can be applied correctly.
 *
 * @package Core_Sitemap
 */

return <<<XSL
<?xml version="1.0" encoding="UTF-8"?>
	<xsl:stylesheet version="2.0"
		xmlns:html="http://www.w3.org/TR/REC-html40"
		xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
		xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>XML Sitemap</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<style type="text/css">
				body {
					font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
					color: #444;
				}

				#sitemap__table {
					border: solid 1px #ccc;
					border-collapse: collapse;
				}

				#sitemap__table tr th {
					text-align: left;
				}

				#sitemap__table tr td,
				#sitemap__table tr th {
					padding: 10px;
				}

				#sitemap__table tr:nth-child(odd) td {
					background-color: #eee;
				}

				a:hover {
					text-decoration: none;
				}
			</style>
		</head>
		<body>
			<div id="sitemap__header">
				<h1>Awfully BAD XML Sitemaps</h1>
				<p>This XML Sitemap is generated by WordPress to make your content more visible for search engines. Learn more about XML sitemaps on <a href="http://sitemaps.org" target="_blank" rel="noopener noreferrer">sitemaps.org</a>.
				</p>
			</div>
			<div id="sitemap__content">
				<p class="text">
					This XML Sitemap contains <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/> URLs.
				</p>
				<table id="sitemap__table">
					<thead>
					<tr>
						<th>URL</th>
						<th>Last Modified</th>
					</tr>
					</thead>
					<tbody>
					<xsl:for-each select="sitemap:urlset/sitemap:url">
						<tr>
							<td>
								<xsl:variable name="itemURL">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:variable>
								<a href="{$itemURL}">
									<xsl:value-of select="sitemap:loc"/>
								</a>
							</td>
							<td>
								<xsl:value-of select="sitemap:lastmod"/>
							</td>
						</tr>
					</xsl:for-each>
					</tbody>
				</table>

			</div>
		</body>
		</html>
	</xsl:template>
	</xsl:stylesheet>\n
XSL;
