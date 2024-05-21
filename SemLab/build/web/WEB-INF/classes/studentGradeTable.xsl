<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/students">
        <html>
            <head>
                <title>Student Grade Table</title>
            </head>
            <body>
                <table border="1">
                    <thead>
                        <th>Name</th>
                        <th>Grades</th>
                        <th>GPA</th>
                    </thead>
                    <tbody>
                        <xsl:for-each select="student">
                            <tr>
                                <td><xsl:value-of select="name"/></td>
                                <td><xsl:value-of select="grades"/></td>
                                <xsl:choose>
                                    <xsl:when test="gpa &gt; 7.5">
                                        <td bgcolor="green"><xsl:value-of select="gpa" /></td>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        <td bgcolor="red"><xsl:value-of select="gpa" /></td>
                                    </xsl:otherwise>
                                </xsl:choose>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
